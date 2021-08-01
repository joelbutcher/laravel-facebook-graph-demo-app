<?php

namespace App\Providers;

use App\Facebook\CachePersistentDataHandler;
use App\Http\Client;
use Facebook\PersistentData\PersistentDataInterface;
use Http\Client\HttpClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(HttpClient::class, fn ($app) => $app[Client::class]);
        $this->app->singleton(PersistentDataInterface::class, fn ($app) => $app[CachePersistentDataHandler::class]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
