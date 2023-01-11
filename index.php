<?php

use App\App;
use routes\RouteInitializer;

RouteInitializer::InitRoutes();

App::getInstance()->listen();
