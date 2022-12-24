<?php 
    require __DIR__ . '/base-controller.php';
    require __DIR__ . '/../lib/arguments.php';
    require __DIR__ . '/../repositories/contacts-repository.php';
    require_once __DIR__ . '/../models/valueObjects/id.php';

    /**
     * The Controller responsable for interacting with contacts
    */
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
            $contact = $this->repo->getById(Id::from($id));
            
            $this->Ok($contact->toDto());
        }

        public function GetAllContacts()
        {
            $contacts = $this->repo->getAll();
            $dtos = [];
            foreach($contacts as $contact) {
                $dtos[] = $contact->toDto();
            }

            $this->Ok($dtos);
        }

        public function CreateContact($contactDto = null)
        {
            $contact = Contact::fromDto($contactDto);
            $insertedID = $this->repo->create($contact);
            $this->Accepted($insertedID);
        }

        public function deleteContact($id = -1)
        {
            $this->repo->delete(Id::from($id));
            $this->NoContent();
        }
    }