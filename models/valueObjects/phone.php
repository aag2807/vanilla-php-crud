<?php
    class Phone
    {
        private string $phone;

        private function __construct($phone)
        {
            Arguments::NotNull($phone, "cannot be null");
            Arguments::GreaterThan(strlen($phone), 0, "cannot be equal to or smaller than 0");
            
            $this->phone = $phone;
        }

        public static function from($string)
        {
            return new Phone($string);
        }

        public function value(): string
        {
            return $this->phone;
        }
    }