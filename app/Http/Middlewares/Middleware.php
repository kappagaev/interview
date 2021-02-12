<?php

namespace App\Http\Middlewares;

use Core\App;
use Core\Http\Request;
use Core\Http\Response;

abstract class Middleware
{
    protected App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    abstract public function handle(Request $request, $closure): Response;
}