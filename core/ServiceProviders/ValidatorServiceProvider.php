<?php


namespace Core\ServiceProviders;


use Core\App;
use Core\Services\Validator;

class ValidatorServiceProvider
{
    public function register(App $app)
    {
        $app->bind('validator', function () use ($app) {
            return new Validator($app->db);
        });
    }
}