<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  
    public function showNewAgentForm()
    {
      return view('agents.new');
    }

    public function createNewAgent(Request $request)
    {
      \App\Agent::create([
        "name" => $request->name,
        "email" => $request->email,
        "phone" => $request->phone,
      ]);

      $message = ucfirst($request->name) ." added succesfully!";
      return view('agents.new',['message' => $message]);
    }

    public function showAllAgents()
    {
      $agents = \App\Agent::paginate(3);
      return view('agents.display',['agents' =>$agents]);
    }

    public function removeAgent($id)
    {

      $agent = \App\Agent::find($id);
       $agentName = $agent->name;
      $agent->delete();
      $message = ucfirst($agentName) . " removed succesfully!";

      $agents = \App\Agent::paginate(3);

      return view('agents.display', ['agents'=>$agents, 'message' => $message]);
    }

    public function showChangeAgentForm($id)
    {
      $agent = \App\Agent::find($id);
      return view('agents.edit',['agent'=>$agent]);
    }

    public function changeAgent($id,Request $request)
    {
      $agent = \App\Agent::find($id);
      $agent->name = $request->name;
      $agent->email = $request->email;
      $agent->phone = $request->phone;
      $agent->save();

      $message = ucfirst($agent->name) . " changed succesfully!";
      return view('agents.edit',['agent'=>$agent, 'message' =>$message]);
    }
}
