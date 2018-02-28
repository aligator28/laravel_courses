<?php

namespace App\Http\Controllers;

use App\Report;
use App\Campaign;
use Illuminate\Http\Request;
use Mailgun\Mailgun;
use App\Helpers\ReportHelper;

class ReportController extends Controller
{
    use ReportHelper;


    private $view_folder = 'report';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = new \stdClass();
        $report->all = $this->createReport($id);
        dd($report->all);

        $campaign = Campaign::owned()->findOrFail($id);
        $all_campaign_emails = $campaign->bunch->subscribers->count();

        $delivered = 0;
        $opened = 0;
        $rejected = 0;
        $failed = 0;

        foreach ($report->all as $key => $rep) {
            switch ($rep->event) {
                case 'delivered':
                    $delivered++;
                    break;
                case 'opened':
                    $opened++;
                    break;                
                case 'rejected':
                    $rejected++;
                    break;                
                case 'failed':
                    $failed++;
                    break;                
                default:
                    # code...
                    break;
            }
        }        

        $report->percentOpened = $this->rounded($opened, $all_campaign_emails);
        $report->percentDelivered = $this->rounded($delivered, $all_campaign_emails);
        $report->percentRejected = $this->rounded($rejected, $all_campaign_emails);
        $report->percentFailed = $this->rounded($failed, $all_campaign_emails);

        return view($this->view_folder.'.index', compact( 'report', 'campaign' ));
    }

    private function createReport($campaign_id)
    {
        $mgClient = new Mailgun( env('MAILGUN_SECRET') ); //key
        $domain = env('MAILGUN_DOMAIN');
        $queryString = array(   
            'begin'        => 'Mon, 19 Feb 2018 09:00:00 -0000',
            'ascending'    => 'yes',
            'limit'        =>  25,
            'pretty'       => 'yes',
            'tags'         => 'campaign_' . $campaign_id
            // 'event' => 'opened',
            // 'subject'      => 'Some other',
        );

        $report = $mgClient
            ->get("$domain/events", $queryString)
            ->http_response_body
            ->items;

        return $report;


        // $repObj = new Report();

        // foreach ($report as $key => $rep) {
        //     $repObj->create([
        //         'campaign_id' => $campaign_id,
        //         'recipient' => $rep->recipient,
        //         'event' => $rep->event,
        //         'event_date' => date("Y-m-d H:i:s", substr($rep->timestamp, 0, 10))
        //     ])->campaign();
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
