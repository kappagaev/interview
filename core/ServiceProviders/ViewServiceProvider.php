<?php


namespace Core\ServiceProviders;


use Core\App;
use Core\Services\View;

class ViewServiceProvider
{
    public function register(App $app)
    {
        $app->bind('view', function () use ($app) {
            return new View($app->session, $app->request, $app->auth);
        });
    }
}