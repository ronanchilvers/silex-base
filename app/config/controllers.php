<?php

use App\Controller\ErrorController;
use App\Controller\TestController;

// Test controlle
$app['controller.test'] = $app->share(function() use ($app) {
    return new TestController();
});
$app->get('/', "controller.test:testAction");
$app->get('/test-error', "controller.test:errorAction");

// ****************************************************************
// Error controller
$app['controller.error'] = $app->share(function() use ($app) {
    return new ErrorController($app);
});
// $app->error("controller.error:errorAction");
$app->error(function (\Exception $ex, $code) use ($app) {
    return $app['controller.error']->errorAction($ex, $code);
});
