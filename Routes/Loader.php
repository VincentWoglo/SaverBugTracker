<?php
    namespace SaverBugTracker\Routes;

    class Loader
    {
        static function View( $FIlePath ){
            require_once(__DIR__.'/../Views/'.$FIlePath.'.php');
        }
    }
?>