<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use App\Application;

$app = new Application();
include(__DIR__ . '/../app/config/boot.php');
include(__DIR__ . '/../app/config/dev.php');
$app->run();
