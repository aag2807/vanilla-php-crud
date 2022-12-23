<?php 
    require __DIR__ . '/app.php';
    require __DIR__ . '/controllers/home-controller.php';
    
    $app = new App();
    $contactsController = new ContactsController();

    $app->get("/",  function($ctx) use ($contactsController) 
    {
        $idToSearch = (int)$ctx->query["id"];
        $contactsController->GetContactById($idToSearch);
    } );

    $app->listen();
