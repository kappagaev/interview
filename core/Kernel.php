<?php

namespace Core;

use Core\Http\Request;
use Core\Http\Response;

class Kernel
{
    /**
     * @var Router
     */
    private Router $router;
    /**
     * @var App
     */
    private App $app;

    public function __construct(Router $router, App $app)
    {
        $this->router = $router;
        $this->app = $app;
    }

    public function handle(Request $request): Response
    {
        $route = $this->router->match($request->getMethod(), $request->getRoute());
        if ($route == null) {
            return abort(404);
        }
        return $this->callController($route, $request);

    }

    private function callController(Route $route, Request $request): Response
    {

        $controller = new $route->controller($this->app);
        if ($route->middleware != null) {
            $middleware = new $route->middleware($this->app);
            return $middleware->handle($request, function ($request) use ($controller, $route) {
                return $controller->callMethod($route->method, $request);
            });
        }

        return $controller->callMethod($route->method, $request);
    }
}