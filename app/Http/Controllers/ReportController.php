<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ReportController extends Controller
{
    public function showWeekReportForm()
    {
       return view("reports.week");
    }

    public function showMonthReportForm()
    {
       return view("reports.month");
    }

    public function exportWeekReport()
    {
        return Excel::download(new \App\Exports\ReportExport, 'week_report.xlsx');
    }

    public function generateMonthReport(Request $request)
    {
        $date = $request->month;
        $year = date('Y',strtotime($date));
        $month = date('M',strtotime($date));
        $agents = \App\Agent::all();

         return view("reports.month",['agents' => $agents, 'year' => $year, 'month' => $month]);
    }

    public function generateWeekReport(Request $request)
    {
        $date = $request->month;
        $year = date('Y',strtotime($date));
        $month = date('M',strtotime($date));
        $agents = \App\Agent::all();

        if($request->has('download')){
            $pdf = PDF::loadView("reports.week",['agents' => $agents, 'year' => $year, 'month' => $month, 'week' => $request->week]);
            return $pdf->download('pdfview.pdf');
        }

         return view("reports.week",['agents' => $agents, 'year' => $year, 'month' => $month, 'week' => $request->week]);
    }
}
