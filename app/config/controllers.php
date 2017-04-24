<?php

use App\Controller\ErrorController;
use App\Controller\TestController;
use Symfony\Component\HttpFoundation\Request;

// Test controlle
$app['controller.test'] = function () use ($app) {
    return new TestController($app);
};
$app->get('/', "controller.test:testAction");
$app->get('/test-error', "controller.test:errorAction");

// ****************************************************************
// Error controller
$app['controller.error'] = function () use ($app) {
    return new ErrorController($app);
};
// $app->error("controller.error:errorAction");
$app->error(function (\Exception $ex, Request $request, $code) use ($app) {
    return $app['controller.error']->errorAction($ex, $request, $code);
});
