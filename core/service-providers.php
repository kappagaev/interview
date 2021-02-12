<?php

$app->registerServiceProvider(\Core\ServiceProviders\FooServiceProvider::class);
$app->registerServiceProvider(\Core\ServiceProviders\ViewServiceProvider::class);
$app->registerServiceProvider(\Core\ServiceProviders\DbServiceProvider::class);
$app->registerServiceProvider(\Core\ServiceProviders\ValidatorServiceProvider::class);
$app->registerServiceProvider(\Core\ServiceProviders\SessionServiceProvider::class);
$app->registerServiceProvider(\Core\ServiceProviders\RequestServiceProvider::class);

