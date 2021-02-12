<?php


namespace Core\ServiceProviders;


use Core\App;
use Core\Services\Db;

class DbServiceProvider
{
    public function register(App $app)
    {
        $app->bind('db', function () {
            return new Db('localhost', 'my_user', 'my_password', 'my_db');
        });
    }
}