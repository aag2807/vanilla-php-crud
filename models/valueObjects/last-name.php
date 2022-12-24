<?php 

    class LastName
    {
        private string $lastName;

        private function __construct($lastName)
        {
            Arguments::NotNull($lastName, "cannot be null");
            Arguments::GreaterThan(strlen($lastName), 0, "cannot be equal to or smaller than 0");
            
            $this->lastName = $lastName;
        }

        public static function from($string)
        {
            return new LastName($string);
        }

        public function value(): string
        {
            return $this->lastName;
        }
    }