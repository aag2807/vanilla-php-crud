<?php 
    class Arguments 
    {
        private static function varName( $v ) {
            $trace = debug_backtrace();
            $vLine = file( __FILE__ );
            $fLine = $vLine[ $trace[0]['line'] - 1 ];
            preg_match( "#\\$(\w+)#", $fLine, $match );
            return $match;
        }
    
        public static function NotNull($arg, $msg = "")
        {
            if($arg == null || !isset($arg) || (!$arg && !is_bool($arg)))
            {
                throw new Exception(Arguments::varName($arg) . " ". $msg);
            }

            return;
        }

        public static function GreaterThan($arg, $min, $msg = "")
        {
            if($arg <= $min)
            {
                throw new Exception(Arguments::varName($arg) . " ". $msg);
            }

            return;
        }
    }