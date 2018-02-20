<?php

namespace App\Jobs;

use App\Campaign;
use Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendCampaign implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mail $mailer)
    {
        $campaign = Campaign::findOrFail($this->id);
        $html = $campaign->template->content;
        $emails = [];

        foreach ($campaign->bunches as $bunch) {
            foreach ($bunch->subscribers as $subscriber) {
                // $emails[] = $subscriber->email;
                $mailer::send( [], [], function ($message) use ($html, $subscriber) {
                  $message->to( [$subscriber->email] ) //$emails
                    ->subject('Pliuta Oleh Campaign')
                    ->from( config('mail.from.address'), config("app.name") )
                    ->setBody($html, 'text/html');
                });
            }
        }

        // $emails = explode(',', string)
        // dd($emails);


        if( count($mailer::failures()) > 0 ) {

           echo "There was one or more failures. They were: <br />";

           foreach($mailer::failures() as $email_address) {
               echo " - $email_address <br />";
            }

        } else {
            echo "No errors, all sent successfully!";
        }
    }
}
