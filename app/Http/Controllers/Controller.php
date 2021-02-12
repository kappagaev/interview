<?php


namespace App\Http\Controllers;


use Core\App;
use Core\Exceptions\ValidationException;
use Core\Http\Request;
use Core\Http\Response;

abstract class Controller
{
    /**
     * @var App
     */
    private App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function __get($var)
    {
        return $this->app->{$var};
    }

    public function view(string $viewName, $vars = []): Response
    {
        return (new Response())->setBody($this->app->view->render(HOME_PATH . '/app/views/' . $viewName . '.php', $vars));
    }

    public function callMethod($method,Request $request): Response
    {
        try {
            $response = $this->{$method}($request);
        } catch (ValidationException $e) {

            $this->app->session->set('errors', $e->getErrors())
                                ->setOld($request->getBody());

            $response = redirect('?route=' . $request->getBackRoute());
        }
        return $response;
    }
}