<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Observers\CampaignObserver;
use App\Campaign;

use App\Observers\BunchObserver;
use App\Bunch;

use App\Observers\TemplateObserver;
use App\Template;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
