<?php

namespace App\ServiceProviders;

use App\Repositories\UserRepository;
use App\Services\UserService;
use Core\App;

class UserServiceProvider
{
    public function register(App $app)
    {
        $app->bind('userService', function () use ($app) {
            return new UserService($app->userRepository, $app->validator);
        });
        $app->bind('userRepository', function () use ($app) {
            return new UserRepository($app->db);
        });
    }
}