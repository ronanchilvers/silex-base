<?php

// Create new app
$app = new App\Application();

// Add the config first
require(__DIR__ . '/../app/config/config.php');

// Core silex providers
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider());
$app->register(new Silex\Provider\HttpFragmentServiceProvider());

// Plates provider
$app->register(new Rych\Silex\Provider\PlatesServiceProvider(), [
    'plates.path' => __DIR__ . '/../app/views'
]);

// Spot2 provider
$app->register(new Ronanchilvers\Silex\Provider\Spot2ServiceProvider(), [
    'spot2.connections' => $app['spot.connections']
]);

return $app;