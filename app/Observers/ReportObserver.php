<?php
namespace App\Observers;

use App\Report;
use Auth;

class ReportObserver
{
    public function saving (Report $report) {
    	$report->created_by = Auth::user()->id;
        return $report;
    }
}