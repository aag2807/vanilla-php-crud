<?php


namespace models\contacts;

use ContactDTO;
use models\contacts\valueObjects\Email;
use models\contacts\valueObjects\FirstName;
use models\contacts\valueObjects\Id;
use models\contacts\valueObjects\LastName;
use models\contacts\valueObjects\Phone;

/**
 * The contact domain entity responsible for representing a Contact in the Domain
 */
class Contact
{
    /**
     * The id of a contact
     * @var Id
     */
    public Id        $contact_id;

    /**
     * The first name of a contact
     * @var FirstName
     */
    public FirstName $first_name;

    /**
     * The last name of a contact
     * @var LastName
     */
    public LastName  $last_name;

    /**
     * The email of a contact
     * @var Email
     */
    public Email     $email;

    /**
     * The phone number of a contact
     * @var Phone
     */
    public Phone     $phone;

    private function __construct($id, $first_name, $last_name, $email, $phone)
    {
        $this->contact_id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * Maps the values passed to the constructor to value objects assigned to the domain entity.
     * @param mixed $id
     * @param mixed $first_name
     * @param mixed $last_name
     * @param mixed $email
     * @param mixed $phone
     * @return Contact
     */
    public static function fromData($id, $first_name, $last_name, $email, $phone): Contact
    {
        $idValueObject        = Id::from($id);
        $firstNameValueObject = FirstName::from($first_name);
        $lastNameValueObject  = LastName::from($last_name);
        $emailValueObject     = Email::from($email);
        $phoneValueObject     = Phone::from($phone);

        return new Contact(
            $idValueObject,
            $firstNameValueObject,
            $lastNameValueObject,
            $emailValueObject,
            $phoneValueObject
        );
    }

    /**
     * A getter that returns the full name of a contact.
     * @return string
     */
    public function fullName(): string
    {
        return $this->first_name->value() . ' ' . $this->last_name->value();
    }

    /**
     * Maps a valid contact domain entity to a contact DTO object
     * @return array
     */
    public function toDto()
    {
        $values =  [
            'contact_id' => $this->contact_id->value(),
            'first_name' => $this->first_name->value(),
            'last_name' => $this->last_name->value(),
            'email' => $this->email->value(),
            'phone' => $this->phone->value()
        ];

        return new ContactDTO($values);
    }

    /**
     * Maps a DTO type object to a valid Contact domain entity.
     * @param mixed $dto
     * @return Contact
     */
    public static function fromDTO(ContactDTO $dto): Contact
    {
        return new Contact(
            $dto->contact_id,
            $dto->first_name,
            $dto->last_name,
            $dto->email,
            $dto->phone
        );
    }
}
