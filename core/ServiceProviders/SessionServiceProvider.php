<?php


namespace Core\ServiceProviders;


use Core\App;
use Core\Services\Session;

class SessionServiceProvider
{
    public function register(App $app)
    {
        $app->bind('session', function () use ($app) {
            return new Session();
        });
    }
}