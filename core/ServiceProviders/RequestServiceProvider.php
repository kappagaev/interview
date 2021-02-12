<?php


namespace Core\ServiceProviders;


use Core\App;
use Core\Http\Request;

class RequestServiceProvider
{
    public function register(App $app)
    {
        $app->bind('request', function () use ($app) {
            return new Request($_SERVER['REQUEST_METHOD'], $_REQUEST, $_FILES);
        });
    }
}