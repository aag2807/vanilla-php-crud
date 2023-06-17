<?php
require __DIR__ . '/vendor/autoload.php';

use App\App\App;
use App\routes\RouteInitializer;

$container = new DI\Container();

RouteInitializer::InitRoutes();
App::getInstance()->listen();
