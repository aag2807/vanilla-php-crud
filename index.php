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

    $app->get("/all", function($ctx) use ($contactsController) 
    {
        $contactsController->GetAllContacts();
    } );

    $app->post("/persist", function($ctx) use ($contactsController)
    {
        $contactDto = $ctx->body;
        $contactsController->CreateContact($contactDto);
    } );

    $app->delete("/delete", function($ctx) use ($contactsController)
    {
        $idToSearch = (int)$ctx->query["id"];
        $contactsController->deleteContact($idToSearch);
    } );

    $app->listen();