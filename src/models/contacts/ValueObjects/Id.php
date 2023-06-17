<?php

namespace App\models\contacts\valueObjects;

use App\lib\Arguments;

class Id
{
    private int $id;

    private function __construct($id)
    {
        Arguments::NotNull($id, "cannot be null");
        Arguments::GreaterThan($id, 0, "cannot be equal to or smaller than 0");

        $this->id = $id;
    }

    public static function from($int)
    {
        return new Id($int);
    }

    public function value(): int
    {
        return $this->id;
    }
}
