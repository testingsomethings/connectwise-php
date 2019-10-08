<?php

namespace Acadea\Connectwise;

use Acadea\Connectwise\Connectwise\Auth\ConnectwiseClient;
use Illuminate\Support\ServiceProvider;

class ConnectwiseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/connectwise.php' => config_path('connectwise.php'),
            ], 'config');

            /*
            $this->loadViewsFrom(__DIR__.'/../resources/views', 'connectwise');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/connectwise'),
            ], 'views');
            */
        }


    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/connectwise.php', 'connectwise');

        $this->app->singleton(ConnectwiseClient::class, function($app){
            $header = [
                'clientId' => config('connectwise.auth.client_id'),
                'Content-Type' => 'application/json',
            ];

            $username = config('connectwise.auth.company_id') . '+' . config('connectwise.auth.public_key');

            $auth = [$username, config('connectwise.auth.private_key')];

            return new ConnectwiseClient($header, $auth);
        });

        $this->app->alias(ConnectwiseClient::class, 'connectwise-client');

    }
}
