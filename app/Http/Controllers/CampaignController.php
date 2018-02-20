<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;
use App\Http\Requests\CampaignRequest;
use App\Bunch;
use App\Template;
use Mail;
use Log;
use Illuminate\Support\Facades\Artisan;

use App\Jobs\SendCampaign;

class CampaignController extends Controller
{
    
    private $view_folder = 'campaign';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function send($id) 
    {
        // Artisan::call('queue:listen');

        $campaign = Campaign::where('sent', '=', 0)->findOrFail($id);
        $html = $campaign->template->content;
        $emails = [];

        foreach ($campaign->bunch->subscribers as $subscriber) {
            $emails[] = $subscriber->email;
        }


        Mail::send( [], [], function ($message) use ($html, $emails) { 

          $message->to( $emails )
            ->subject('Some other')
            ->from( config('mail.from.address'), config("app.name") )
            ->setBody($html, 'text/html');
        });

        if( count(Mail::failures()) > 0 ) {

           echo "There was one or more failures. They were: <br />";

           foreach(Mail::failures() as $email_address) {
               echo " - $email_address <br />";
            }

        } 
        else {
            $campaign->sent = 1;
            $campaign->save();

            echo "No errors, all sent successfully!";
        }
        
        return redirect()->route($this->view_folder . '.index');

        // Log::info("Request Cycle with Queues Begins");
        // $this->dispatch(new SendCampaign($id));
        // Log::info("Request Cycle with Queues Ends");

        // $campaign = Campaign::findOrFail($id);
        // $html = $campaign->template->content;
        // $emails = [];

        // foreach ($campaign->bunches as $bunch) {
        //     foreach ($bunch->subscribers as $subscriber) {
        //         $emails[] = $subscriber->email;
        //         dump($subscriber->email);
        //     }
        // }
        // dd();


        // Mail::send( [], [], function ($message) use ($html) {
        //   $message->to('pluta.pluta.pluta@gmail.com')
        //     ->subject('Pliuta Oleh Campaign')
        //     ->from( config('mail.from.address'), config("app.name") )
        //     ->setBody($html, 'text/html');
        // });

    }
    
    public function index(Campaign $item)
    {
        $items = $item::owned()->get();

        return view($this->view_folder.'.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Bunch $bunch, Template $template)
    {
        $bunches = $bunch->getSelectList();
        $templates = $template->getSelectList();

        // just to select first element in multiple select list
        // $selected_bunches = [1];
        // $selected_templates = [1];
        return view($this->view_folder.'.create', compact(['bunches', 'templates']) ); //, 'selected_bunches', 'selected_templates'
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Campaign $campaign, Bunch $bunch, Template $template, CampaignRequest $request)
    {

        // just create campaign (table do not have fields bunch_id and template_id)
        $inserted_campaign = $campaign
            ->create( $request->except( ['bunch_id', 'template_id'] ) );

        $campaign
            ->findOrFail($inserted_campaign->id)   
            ->bunch()
            ->associate( $bunch->find($request->bunch_id) )
            ->save();

        $campaign
            ->findOrFail($inserted_campaign->id)
            ->template()
            ->associate( $template->find($request->template_id) )
            ->save();


        return redirect()->route($this->view_folder . '.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campaign  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Campaign::owned()->findOrFail($id);
        return view($this->view_folder . '.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campaign  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Campaign::owned()->findOrFail($id);//with(['bunches', 'templates'])->
        
        $bunches = Bunch::getSelectList();
        $templates = Template::getSelectList();

        $selected_bunches = $item->bunch->id;//Campaign::selected($id, 'bunches', $bunches, 'name');
        $selected_templates = $item->template->id;//Campaign::selected($id, 'template', $templates, 'name');

        return view($this->view_folder.'.edit', compact( ['item', 'bunches', 'templates' , 'selected_bunches', 'selected_templates'] ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campaign  $item
     * @return \Illuminate\Http\Response
     */
    public function update(CampaignRequest $request, Bunch $bunch, Template $template, Campaign $item, $id)
    {

        // $bunch->where([
        //     ['campaign_id', '=', $id],
        //     ['id', '!=',  $request->bunch_id]
        // ])->update(['campaign_id' => NULL]);

        // $template->where([
        //     ['campaign_id', '=', $id],
        //     ['id', '!=',  $request->template_id]
        // ])->update(['campaign_id' => NULL]);


        $item->update( $request->except( ['bunch_id', 'template_id'] ) );

        $item
            ->findOrFail($id)
            ->bunch()
            ->associate( $bunch->find($request->bunch_id) )
            ->save();

        $item
            ->findOrFail($id)
            ->template()
            ->associate( $template->find($request->template_id) )
            ->save();

        // $item->findOrFail($id)->update($request->all());
        return redirect()->route( $this->view_folder . '.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campaign  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->route($this->view_folder . '.index');
    }
}
