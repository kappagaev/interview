<?php


namespace Core\Services;


use Core\Http\Request;

class View
{

    private array $utilities;

    public function __construct(Session $session, Request $request, Auth $auth)
    {
        $this->utilities['session'] = $session;
        $this->utilities['request'] = $request;
        $this->utilities['auth'] = $auth;
    }
    public function render($viewPath, $vars)
    {
        extract($vars);
        extract($this->utilities);
        ob_start();
        include($viewPath);
        return ob_get_clean();
    }

}