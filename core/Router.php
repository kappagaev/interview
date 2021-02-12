<?php

namespace Core;

class Router
{
    public array $routes;

    public function get($route, $controller, $function)
    {
        return $this->addRoute($route, 'GET', $controller, $function);
    }

    public function post($route, $controller, $function)
    {
        return $this->addRoute($route, 'POST', $controller, $function);
    }

    private function addRoute($routePath, $method, $controller, $function)
    {
        $route = new Route($controller, $function);
        $this->routes[$method][$routePath] = $route;
        return $route;
    }

    public function match($method, $route)
    {

        return $this->routes[$method][$route];
    }
}