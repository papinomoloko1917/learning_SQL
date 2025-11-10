<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router\Router;

$uri = $_SERVER['REQUEST_URI'];

$run = new Router();
$run->route($uri);
