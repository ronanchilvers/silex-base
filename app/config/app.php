<?php

use App\Application;

// Create new app
$app = new Application();

// Core silex providers
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\RoutingServiceProvider());
$app->register(new Silex\Provider\HttpFragmentServiceProvider());

// Twig
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/../views'
]);

return $app;
