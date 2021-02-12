<?php


namespace App\Http\Middlewares;


use Core\Http\Request;
use Core\Http\Response;

class AuthMiddleware extends Middleware
{
    public function handle(Request $request, $closure): Response
    {
        if($this->app->auth->logged()) {
            return $closure($request);
        }

        return redirect('');
    }
}