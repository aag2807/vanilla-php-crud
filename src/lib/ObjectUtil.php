<?php

namespace App\lib;

class ObjectUtil 
{
    public static function Assign($heir, $owner)
    {
        foreach ($owner as $key => $value) {
            $heir->$key = $value;
        }
    }
}