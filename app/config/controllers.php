<?php

use App\TestController;

$app['controller.test'] = $app->share(function() use ($app) {
    return new TestController();
});
$app->get('/', "controller.test:testAction");
