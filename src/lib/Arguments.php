<?php

namespace App\lib;

use Exception;

class Arguments
{
    private static function varName($v)
    {
        $trace = debug_backtrace();
        $vLine = file(__FILE__);
        $fLine = $vLine[$trace[0]['line'] - 1];
        preg_match("#\\$(\w+)#", $fLine, $match);
        return $match;
    }

    public static function NotNull(mixed $arg, string $msg = "")
    {
        if($arg == null || !isset($arg)) {
            throw new Exception("null argument was passed");
        }

        if (!$arg && !is_bool($arg)) {
            throw new Exception(Arguments::varName($arg) . " " . $msg);
        }

        return;
    }

    public static function GreaterThan($arg, $min, $msg = "")
    {
        if ($arg <= $min) {
            throw new Exception(Arguments::varName($arg) . " " . $msg);
        }

        return;
    }
}
