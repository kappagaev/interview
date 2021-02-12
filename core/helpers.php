<?php

use Core\Http\Response;

function dd($var)
{
    var_dump($var);
    die;
}

function redirect($redirectTo)
{
    return (new \Core\Http\Response())->addHeader("Location: /".$redirectTo);
}

function abort(int $int): Response
{
    return new Response($int);
}