<?php


namespace App\models\contacts;

use App\DTO\ContactDTO;
use App\lib\Arguments;
use App\lib\ObjectUtil;

/**
 * The contact domain entity responsible for representing a Contact in the Domain
 */
class Contact
{
    /**
     * The id of a contact
     * @var string $contact_id
     */
    public string $contact_id;

    /**
     * The first name of a contact
     * @var string $first_name
     */
    public string $first_name;

    /**
     * The last name of a contact
     * @var string $last_name
     */
    public string $last_name;

    /**
     * The email of a contact
     * @var string $email
     */
    public string $email;

    /**
     * The phone number of a contact
     * @var string $phone
     */
    public string $phone;

    private function __construct($data = [])
    {
        Arguments::NotNull($data, "cannot be null");
        ObjectUtil::Assign($this, $data);
    }

    /**
     * Maps the values passed to the constructor to value objects assigned to the domain entity.
     * @param array $data
     * @return Contact
     */
    public static function fromData($data): Contact
    {
        return new Contact( $data );
    }

    /**
     * A getter that returns the full name of a contact.
     * @return string
     */
    public function fullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Maps the values of the domain entity to a DTO type object.
     * @return ContactDTO
     */
    public function toDto()
    {
        $values = [
            'contact_id' => $this->contact_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone
        ];

        return new ContactDTO($values);
    }

    /**
     * Maps a DTO type object to a valid Contact domain entity.
     * @param ContactDTO $dto
     * @return Contact
     */
    public static function fromDTO(ContactDTO $dto): Contact
    {
        return new Contact($dto);
    }
}
