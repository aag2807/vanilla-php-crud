<?php

namespace App\routes;

use App\App\App;
use App\controllers\ContactsController;

class ContactRouter
{
    private $controller;
    private $app;

    const CONTACTS = "/contacts";

    public function __construct()
    {
        $this->app = App::getInstance();
        $this->registerRoutes();
    }

    private function registerRoutes()
    {
        $this->app->get(ContactRouter::CONTACTS . "/", function ($ctx) {
            $idToSearch = (int)$ctx->query["id"];
            $this->getController()->GetContactById($idToSearch);
        });

        $this->app->get(ContactRouter::CONTACTS . "/all", function ($ctx) {
            $this->getController()->GetAllContacts();
        });

        $this->app->post(ContactRouter::CONTACTS . "/contacts", function ($ctx) {
            $contactDto = $ctx->body;
            $this->getController()->CreateContact($contactDto);
        });

        $this->app->delete(ContactRouter::CONTACTS . "/delete", function ($ctx) {
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
