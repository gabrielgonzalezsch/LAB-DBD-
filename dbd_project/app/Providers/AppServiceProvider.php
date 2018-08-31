<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SearchService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton(SearchService::class, function(){
        return new SearchService(config('aeropuerto.default'));
      });
    }
}
