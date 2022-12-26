<?php 
    require __DIR__ . '/app.php';
    require __DIR__ . '/routes/init-routes.php';

    InitRoutes();

    App::getInstance()->listen();