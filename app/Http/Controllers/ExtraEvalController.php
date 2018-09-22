<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraEvalController extends Controller
{
    public function showExtraEvalForm()
    {
      $agents = \App\Agent::all();

      return view("reports.extra",['agents' => $agents]);
    }


    public function submitExtraEvals(Request $request)
    {
       $params = $request->all();

       foreach($params as $key => $value)
       {
         $extra = new \App\ExtraEval();
         $agent_id = substr($key,1);
         $date = $request->month;
         $month = date('M', strtotime($date));
         $year =  date('Y', strtotime($date));

         if(substr($key,0,1) == "p") //productivity
          {
             $extra->productivity = $value;
             $extra->test = $params["t".$agent_id] ;
             $extra->agent_id = $agent_id;
             $extra->month = $month;
             $extra->year = $year;
            $extra->save();
          }



       }

       $message = "Productivity and test values recorded succesfully!";
       $agents = \App\Agent::all();
      return view('reports.extra',['agents' => $agents, 'message' => $message]);
    }
}
