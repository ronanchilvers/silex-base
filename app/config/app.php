<?php

use App\Application;

// Create new app
$app = new Application();

// Constants
$app['app_root'] = __DIR__ . '/../..';
$app['app_var'] = $app['app_root'] . '/var';
$app['app_web'] = $app['app_root'] . '/web';

// Include configuration
$configFile = $app['app_root'] . '/local.config.php';
if (!file_exists($configFile)) {
    throw new LogicException('Missing local configuration at ' . $configFile);
}
$app['config'] = require_once($configFile);

// Core silex providers
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\RoutingServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider(),[
    'session.storage.save_path' => $app['app_var'] . '/sessions',
    'session.storage.options' => [
        'gc_maxlifetime' => 86400,
        'cookie_secure' => true,
        'cookie_httponly' => true,
    ]
);
$app->register(new Silex\Provider\HttpFragmentServiceProvider());
$app->register(new Silex\Provider\MonologServiceProvider(), [
    'monolog.logfile' => __DIR__ . '/../../var/log/application.log'
]);

// Twig
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/../views'
]);

// Controller annotations
$app->register(new DDesrosiers\SilexAnnotations\AnnotationServiceProvider(), array(
    'annot.cache' => new Doctrine\Common\Cache\FilesystemCache(
        __DIR__ . '/../../var/cache/annotations'
    ),
    'annot.controllerDir' => __DIR__ . '/../../src/Controller',
    'annot.controllerNamespace' => 'App\\Controller\\'
));

// Spot2
$app->register(new Ronanchilvers\Silex\Spot2\Provider\Spot2ServiceProvider(), [
    'spot2.connections' => [
        'default' => 'sqlite://' . __DIR__ . '/../../var/data/database.sqlite'
    ]
]);

// Knp Console
$app->register(new Knp\Provider\ConsoleServiceProvider());

return $app;
