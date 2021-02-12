<?php


namespace App\Services;


use App\Repositories\UserRepository;
use Core\Exceptions\ValidationException;
use Core\Services\Auth;
use Core\Services\Session;

class AuthService
{


    /**
     * @var Auth
     */
    private Auth $auth;
    /**
     * @var Session
     */
    private Session $session;
    /**
     * @var UserRepository
     */
    private UserRepository $repository;

    public function __construct(Auth $auth, UserRepository $repository, Session $session)
    {
        $this->auth = $auth;
        $this->session = $session;
        $this->repository = $repository;
    }

    public function login($data)
    {
        $user = $this->repository->getBy('email', $data['email']);

        if (!password_verify($data['password'],$user['password'])) {
            throw (new ValidationException())->setErrors(['Email or password is incorrect']);
        }
        $this->session->set('auth_id', $user['id']);

        return $this->auth->user();
    }

    public function logout()
    {
        $this->session->delete('auth_id');

        return true;
    }
}