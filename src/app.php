<?php

// Create new app
$app = new App\Application();

// Add the config first
require(__DIR__ . '/../app/config/config.php');

// Core silex providers
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\HttpFragmentServiceProvider());

// Twig
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/../app/views'
]);

// Spot2 provider
$app->register(new Ronanchilvers\Silex\Provider\Spot2ServiceProvider(), [
    'spot2.connections' => $app['spot2.connections']
]);

return $app;
