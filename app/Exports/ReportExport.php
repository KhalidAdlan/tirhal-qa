<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{


    public function view(): \Illuminate\Contracts\View\View
    {
      $agents = \App\Agent::all();

       return view("reports.week",['agents' => $agents, 'year' => '2018', 'month' => 'Sep', 'week' => '3']);
    }
}
