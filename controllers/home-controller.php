<?php 
    require __DIR__ . '/base-controller.php';
    require __DIR__ . '/../lib/arguments.php';
    require __DIR__ . '/../contacts-repository.php';

    class ContactsController extends BaseController
    {
        private $repo;

        public function __construct()
        {
            parent::__construct();
            $this->repo = new ContactsRepository();
        }

        public function GetContactById($id = 0)
        {
            $contact = $this->repo->getById($id);
            
            $this->Ok($contact->toDto());
        }
    }