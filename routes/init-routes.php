<?php
    require_once __DIR__ . '/contact-routes.php';
    
    function InitRoutes()
    {
       new ContactRouter();
    }