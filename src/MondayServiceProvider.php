<?php

namespace Proclame\Monday;

use TBlack\MondayAPI\Token;
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
            if(class_exists('\App\Services\MondayBoard')){
                $mondayBoard = new \App\Services\MondayBoard();
            } else {
                $mondayBoard = new MondayBoard();
            }
            $mondayBoard->setToken(new Token(config('monday.monday_token')));

            return $mondayBoard;
        });
    }

    public function provides()
    {
        return ['monday'];
    }
}
