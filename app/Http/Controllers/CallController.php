<?php

namespace App\Http\Controllers;

use App\Call;
use Illuminate\Http\Request;

class CallController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calls = \App\Calls::paginate(3);
        return view();
    }

    public function createNewCall(Request $request)
    {
      $date = $request->date;
      $message = "Your call have been saved succesfully!";

      $day = date('d',strtotime($date));

      if($day <= 7)
      {

        $week = 1;
      }
      else if($day <= 14)
      {
        $week = 2;
      }
      else if($day <= 21)
      {
        $week = 3;
      }
      else {
        $week = 4;
      }

      \App\Call::create([
        'agent_id' => $request->agent_id,
        'details' => $request->details,
        'remark' => $request->remark,
        'evaluation' => $request->result,
        'year' => date('Y',strtotime($date)),
        'cusPhone' => $request->cusPhone,
        'month' => date('M',strtotime($date)),
        'week' => $week,
      ]);

      $agents = \App\Agent::all();
      return view('calls.summary',['agents' => $agents , 'message' => $message]);
    }

    public function showCallDetails($id)
    {
      $call = \App\Call::find($id);
      $details = json_decode($call->details);
      $agent = \App\Agent::find($call->agent_id)->name;
      $full = \App\Category::fullMark();
      $score = 0;
      foreach($details as $key => $value)
      {
        $k = substr($key,1);
        $score += $value;
        $categories[$key] = \App\Category::find($k)->name . "|" . $value;
      }

     return view("calls.call-details", ['score' => $score, 'full' => $full, 'call' => $call, 'agent' => $agent, 'categories' => $categories]);
    }


    public function removeCall(Request $request, $id)
    {
      $call =  \App\Call::find($request->cid);
      $call->delete();
      $message = "Your call has been deleted successfully!";
      $agent = \App\Agent::find($id);
      $calls = $agent->calls()->latest()->paginate(5);
      return view("calls.calls",['calls' => $calls, 'message' => $message]);
    }
    public function showAgentCalls($id)
    {
      $calls = \App\Agent::find($id)->calls()->latest()->paginate(5);
      return view('calls.calls', ['calls' => $calls]);
    }
    public function showCallEvaluationForm($id)
    {
      $agent = \App\Agent::find($id);
      $categories = \App\Category::all();
      $fullMark = \App\Category::fullMark();
      return view('calls.new', ['agent' =>$agent,'fullMark' => $fullMark, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function show(Call $call)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function edit(Call $call)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Call $call)
    {
        //
    }

    public function showAllAgents()
    {
      $agents = \App\Agent::all();
      return view('calls.summary',['agents' => $agents]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function destroy(Call $call)
    {
        //
    }
}
