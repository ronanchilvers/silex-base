<?php
$app['config'] = require(__DIR__ . '/config.php');

// Core silex providers
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider());
$app->register(new Silex\Provider\HttpFragmentServiceProvider());

// Plates provider
$app->register(new Rych\Silex\Provider\PlatesServiceProvider(), [
    'plates.path' => __DIR__ . '/../views'
]);

// Spot2 provider
$app->register(new Ronanchilvers\Silex\Provider\Spot2ServiceProvider(), [
    'spot2.connections' => $app['config']['spot.connections']
]);

return $app;
