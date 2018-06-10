<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModelObserverServiceProvider extends ServiceProvider
{

    public function boot()
    {
        \App\Models\Page::observe(\App\Observers\PageObserver::class);
    }

    public function register()
    {
        //
    }
}
