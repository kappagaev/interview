<?php


namespace App\ServiceProviders;


use App\Services\AuthService;
use Core\App;
use Core\Services\Auth;

class AuthServiceProvider
{
    public function register(App $app)
    {
        $app->bind('auth', function () use ($app) {
            if ($app->session->get('auth_id')) {
                return new Auth($app->userRepository->getBy('id', $app->session->get('auth_id')));
            } else {
                return new Auth();
            }
        });
        $app->bind('authService', function () use ($app) {
            return new AuthService($app->auth, $app->userRepository, $app->session);
        });
    }
}