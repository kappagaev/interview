<?php


namespace Core;


class Route
{
    public string $controller;

    public string $method;

    public $middleware;

    public function __construct($controller, $method)
    {
        $this->controller = $controller;
        $this->method = $method;
    }

    public function middleware(string $middlewareClass): Route
    {
        $this->middleware = $middlewareClass;

        return $this;
    }

}