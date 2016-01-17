<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use App\Application;

$app = include(__DIR__ . '/../src/app.php');
include(__DIR__ . '/../app/config/dev.php');
include(__DIR__ . '/../app/config/controllers.php');
$app->run();
