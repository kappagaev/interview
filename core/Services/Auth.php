<?php


namespace Core\Services;


use App\Repositories\UserRepository;

class Auth
{


    private $user;

    public function __construct($user = null)
    {
        $this->user = $user;
    }

    public function user()
    {
        return $this->user;
    }

    public function logged()
    {
        return isset($this->user);
    }

}