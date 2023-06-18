<?php
require __DIR__ . '/vendor/autoload.php';

use App\App\App;
use App\routes\RouteInitializer;

RouteInitializer::InitRoutes();
App::getInstance()->listen();
