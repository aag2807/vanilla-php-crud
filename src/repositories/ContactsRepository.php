<?php

namespace App\repositories;

use PDO;
use App\lib\Arguments;
use App\models\contacts\Contact;

class ContactsRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct('contacts');
    }

    public function getAll($limit = 100)
    {
        $sql = "SELECT * FROM contacts LIMIT :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $contacts = [];
        foreach ($result as $row) {
            $contacts[] = Contact::fromData($row);
        }

        return $contacts;
    }

    /**
     * Gets a contact by its id
     * @param int $id
     * @return Contact
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM contacts WHERE contact_id = :value";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':value', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        Arguments::NotNull($result, ": there exists not contact with the id of: " . $id);

        return Contact::fromData(
            $result
        );
    }

    public function create($entity = new Contact(1, '', '', '', '')): int
    {
        $sql = 'INSERT INTO ' . $this->table . ' (contact_id, first_name, last_name, email, phone) VALUES (:value1, :value2, :value3, :value4, :value5)';

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':value1', $entity->contact_id, PDO::PARAM_STR);
        $stmt->bindValue(':value2', $entity->first_name, PDO::PARAM_STR);
        $stmt->bindValue(':value3', $entity->last_name, PDO::PARAM_STR);
        $stmt->bindValue(':value4', $entity->email, PDO::PARAM_STR);
        $stmt->bindValue(':value5', $entity->phone, PDO::PARAM_STR);

        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function update($entity = [])
    {
        $sql = "UPDATE " . $this->table . " SET ";
        $i = 0;
        foreach ($entity as $key => $value) {
            if ($i > 0) {
                $sql .= ", ";
            }
            $sql .= $key . " = :" . $key;
            $i++;
        }
        $sql .= " WHERE contact_id = :contact_id";

        $stmt = $this->db->prepare($sql);

        foreach ($entity as $key => $value) {
            $stmt->bindValue(':' . $key, $value, PDO::PARAM_STR);
        }

        return $stmt->execute();
    }

    /**
     * Deletes a contact from the database
     * @param int $id
     */
    public function delete(int $id): void
    {
        $sql = "DELETE FROM " . $this->table . " WHERE contact_id = :value";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':value', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}