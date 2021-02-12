<?php


namespace Core\ServiceProviders;


use Core\Services\Foo;
use Core\App;

class FooServiceProvider
{
    public function register(App $app)
    {
        $app->bind('foo', function () {
            return new Foo();
        });
    }
}