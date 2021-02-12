<?php


namespace App\Http\Middlewares;


use Core\Http\Request;
use Core\Http\Response;

class TestMiddleware extends Middleware
{
    public function handle(Request $request, $closure): Response
    {
        if( 2 == 3) $closure($request);

        return redirect('');
    }
}