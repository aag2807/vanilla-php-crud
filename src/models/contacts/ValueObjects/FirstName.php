<?php

namespace App\models\contacts\valueObjects;

use App\lib\Arguments;

class FirstName
{
    private string $firstName;

    private function __construct($firstName)
    {
        Arguments::NotNull($firstName, "cannot be null");
        Arguments::GreaterThan(strlen($firstName), 0, "cannot be equal to or smaller than 0");

        $this->firstName = $firstName;
    }

    public static function from($string)
    {
        return new FirstName($string);
    }

    public function value(): string
    {
        return $this->firstName;
    }
}
