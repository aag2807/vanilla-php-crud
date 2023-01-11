<?php

namespace controllers;

use models\contacts\Contact;
use models\contacts\valueObjects\Id;
use repositories\ContactsRepository;

/**
 * The Controller responsable for interacting with contacts
 */
class ContactsController extends BaseController
{
    private ContactsRepository $repo;

    public function __construct()
    {
        parent::__construct();
        $this->repo = new ContactsRepository();
    }

    public function GetContactById($id = 0): void
    {
        $contact = $this->repo->getById(Id::from($id));

        $this->Ok($contact->toDto());
    }

    public function GetAllContacts(): void
    {
        $contacts = $this->repo->getAll();
        $dtos = [];
        foreach ($contacts as $contact) {
            $dtos[] = $contact->toDto();
        }

        $this->Ok($dtos);
    }

    public function CreateContact($contactDto = null): void
    {
        $contact = Contact::fromDto($contactDto);
        $insertedID = $this->repo->create($contact);
        $this->Accepted($insertedID);
    }

    public function deleteContact($id = -1): void
    {
        $this->repo->delete(Id::from($id));
        $this->NoContent();
    }
}
