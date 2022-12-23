<?php 

    function varName( $v ) {
        $trace = debug_backtrace();
        $vLine = file( __FILE__ );
        $fLine = $vLine[ $trace[0]['line'] - 1 ];
        preg_match( "#\\$(\w+)#", $fLine, $match );
        return $match;
    }

    class Arguments 
    {
        public static function NotNull($arg, $msg = "")
        {
            if($arg == null || !isset($arg) || (!$arg && !is_bool($arg)))
            {
                throw new Exception(varName($arg) . " ". $msg);
            }

            return;
        }


    }