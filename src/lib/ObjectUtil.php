<?php

namespace App\lib;

class ObjectUtil
{
    public static function Assign($heir, $owner)
    {
        if( is_array($owner) )
        {
            $owner = (object) $owner;
        }
        foreach ($owner as $key => $value) {
            if (property_exists($heir, $key)) {
                $heir->$key = $value;
            }
        }
    }
}
