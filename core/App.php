<?php


namespace Core;


use http\Exception;

class App
{
    private array $serviceProviders = [];

    private array $binded;

    private array $initialized;

    public function registerServiceProvider($class)
    {
        $this->serviceProviders[] = $class;
    }

    public function initServiceProviders()
    {
        foreach ($this->serviceProviders as $serviceProvider) {
            call_user_func(array($serviceProvider, 'register'), $this);
        }
    }

    public function bind(string $name, $callback)
    {
        $this->binded[$name] = $callback;
    }

    public function __get($name)
    {
        if(isset($this->initialized[$name])) {
            return $this->initialized[$name];
        }
        $this->initialized[$name] = $this->binded[$name]();

        return $this->initialized[$name];
    }

}