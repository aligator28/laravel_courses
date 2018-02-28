<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Observers\CampaignObserver;
use App\Campaign;

use App\Observers\ReportObserver;
use App\Report;

use App\Observers\BunchObserver;
use App\Bunch;

use App\Observers\TemplateObserver;
use App\Template;

use App\Observers\SubscriberObserver;
use App\Subscriber;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Campaign::observe(CampaignObserver::class);
        Bunch::observe(BunchObserver::class);
        Template::observe(TemplateObserver::class);
        Subscriber::observe(SubscriberObserver::class);
        Report::observe(ReportObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        return \Http\Adapter\Guzzle6\Client::createWithConfig([ ]);
    }
}
