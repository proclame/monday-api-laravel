<?php

namespace Proclame\Monday;

use Proclame\Monday\Monday;
use TBlack\MondayAPI\Token;
use Proclame\Monday\Connection;
use TBlack\MondayAPI\MondayBoard;
use Illuminate\Support\ServiceProvider;

class MondayServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/monday.php' => config_path('monday.php')
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/monday.php', 'monday');

        $this->app->bind('monday', function ($app) {
            $mondayBoard = new MondayBoard();
            $mondayBoard->setToken(new Token(config('monday.monday_token')));

            return $mondayBoard;
        });
    }

    public function provides()
    {
        return ['monday'];
    }
}
