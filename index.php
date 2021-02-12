<?php
require_once 'vendor/autoload.php';

session_start();

define('HOME_PATH', dirname(__FILE__));

require_once 'core/helpers.php';


$app = new \Core\App();

require 'core/service-providers.php';
require 'app/service-providers.php';

$app->initServiceProviders();

$request = $app->request;
$router = new \Core\Router();

require 'app/routes.php';

$kernel = new \Core\Kernel($router, $app);

$response = $kernel->handle($request);

$response->send();
