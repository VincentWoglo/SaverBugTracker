<?php
    namespace SaverBugTracker\Routes;

    class Router{

        /** @var const */
        private const FUNCTIONCALLER = '@';
        /** @var const */
        private const ZERO = '0';
        /** @var const */
        private const ONE = 1;


        protected  static function GetControllerFunction($ControllerName): string
        {
            if(str_contains($ControllerName, Router::FUNCTIONCALLER))
            {
                $Offset = strpos($ControllerName, Router::FUNCTIONCALLER);
                return substr($ControllerName, $Offset + Router::ONE);
            }

            return 'Controller Class Not Found';
        }


        protected  static function GetControllerName($ControllerName): string
        {
            if(str_contains($ControllerName, Router::FUNCTIONCALLER))
            {
                $BeforeFunctionName = strpos($ControllerName, Router::FUNCTIONCALLER);
                return substr($ControllerName, Router::ZERO, $BeforeFunctionName);
            }

            return 'Function Not Found';
        }
    }
?>