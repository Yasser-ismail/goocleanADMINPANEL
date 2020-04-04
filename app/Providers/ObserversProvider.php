<?php

namespace App\Providers;

use App\Models\Appoientment;
use App\Models\Workinghour;
use App\Observers\BackEnd\AppoientmentObserver;
use App\Observers\BackEnd\WorkinghourObserver;
use Illuminate\Support\ServiceProvider;

class ObserversProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Workinghour::observe(WorkinghourObserver::class);
        Appoientment::observe(AppoientmentObserver::class);
    }
}
