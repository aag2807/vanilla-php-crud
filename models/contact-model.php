<?php 

    Class Contact
    {
        public int    $contact_id;
        public string $first_name;
        public string $last_name;
        public string $email;
        public string $phone;

        private function __construct($id, $first_name, $last_name, $email, $phone)
        {
            $this->contact_id = $id;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->phone = $phone;
        }

        public static function fromData($id, $first_name, $last_name, $email, $phone): Contact
        {
            return new Contact($id, $first_name, $last_name, $email, $phone);
        }

        public function fullName(): string
        {
            return $this->first_name . ' ' . $this->last_name;
        }

        public function toDto()
        {
            return [
                'contact_id' => $this->contact_id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone
            ];
        }
    }
