<?php

namespace routes;

use App\App;
use controllers\ContactsController;

class ContactRouter
{
    private $controller;
    private $app;

    public function __construct()
    {
        $this->app = App::getInstance();
        $this->registerRoutes();
    }

    private function registerRoutes()
    {
        $this->app->get("/", function ($ctx) {
            $idToSearch = (int)$ctx->query["id"];
            $this->getController()->GetContactById($idToSearch);
        });

        $this->app->get("/all", function ($ctx) {
            $this->getController()->GetAllContacts();
        });

        $this->app->post("/contacts", function ($ctx) {
            $contactDto = $ctx->body;
            $this->getController()->CreateContact($contactDto);
        });

        $this->app->delete("/delete", function ($ctx) {
            $idToSearch = (int)$ctx->query["id"];
            $this->getController()->deleteContact($idToSearch);
        });
    }

    private function getController()
    {
        if ($this->controller == null) {
            $this->controller = new ContactsController();
        }
        return $this->controller;
    }
}
