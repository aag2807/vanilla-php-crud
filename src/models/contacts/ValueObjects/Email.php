<?php

namespace App\models\contacts\valueObjects;

use App\lib\Arguments;

class Email
{
    private string $email;

    private function __construct($email)
    {
        Arguments::NotNull($email, "cannot be null");
        Arguments::GreaterThan(strlen($email), 0, "cannot be equal to or smaller than 0");

        $this->email = $email;
    }

    public static function from($string)
    {
        return new Email($string);
    }

    public function value(): string
    {
        return $this->email;
    }
}
