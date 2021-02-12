<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middlewares\AuthMiddleware;
use App\Http\Middlewares\GuestMiddleware;

$router->get('registration', UserController::class, 'create')->middleware(GuestMiddleware::class);;
$router->post('registration', UserController::class, 'store')->middleware(GuestMiddleware::class);;
$router->get('user/edit', UserController::class, 'edit');
$router->post('user/edit', UserController::class, 'update');
$router->get('', UserController::class, 'foo');

$router->get('login', LoginController::class, 'login')->middleware(GuestMiddleware::class);;
$router->post('login', LoginController::class, 'attempt')->middleware(GuestMiddleware::class);

$router->get('profile', UserController::class, 'profile')->middleware(AuthMiddleware::class);
$router->get('logout', LoginController::class, 'logout')->middleware(AuthMiddleware::class);

