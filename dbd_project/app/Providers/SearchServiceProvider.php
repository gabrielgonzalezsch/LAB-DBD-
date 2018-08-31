<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Aeropuerto;
use App\Services\SearchService;

class SearchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
     protected $defer = true;

    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SearchService::class, function(){
          return new SearchService(config('aeropuerto.default'));
        });
    }

    public function provides()
    {
        return [SearchService::class];
    }
}
