<?php

namespace App\controllers;

use App\repositories\ContactsRepository;
use App\models\contacts\Contact;
use App\models\contacts\valueObjects\Id;

/**
 * The Controller responsable for interacting with contacts
 */
class ContactsController extends BaseController
{
    private ContactsRepository $repo;

    public function __construct(ContactsRepository $contactsRepository)
    {
        parent::__construct();
        $this->repo = $contactsRepository;
    }

    public function GetContactById($id = 0): void
    {
        $contact = $this->repo->getById(Id::from($id));
        $result = $contact->toDto();

        $this->Ok($result);
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
        $this->repo->delete($id);
        $this->NoContent();
    }
}
