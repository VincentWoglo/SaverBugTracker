<?php
    namespace SaverBugTracker\Routes;

    class Loader
    {

        /**
         * Load the pages in the Views folder
         * @param string $FilePath
         */
        static function View( $FIlePath ): void
        {
            require_once(__DIR__.'/../Views/'.$FIlePath.'.php');
        }
        

        /**
         * Instantiate a class in the Controller folder
         * And also call function from the controller class
         * 
         * @param string $ControlName
         * @param array The $Data param allow you to pass data from Controller to View
         */
        static function Controller($ControllerName, $Data = []): string
        {
            if(str_contains($ControllerName, "@")){
                extract($Data);
                $ControllerArray = explode("@", $ControllerName);

                require_once(__DIR__.'/../Controller/'.$ControllerArray[0].'.php');
                $ClassWithNameSpace = '\SaverBugTracker\Controller\\'.$ControllerArray[0];

                $Controller = new $ClassWithNameSpace($Data);
                $Function = $ControllerArray[1];
                $Controller->$Function();
            }

            return "Controller Does Not Exist";
        }


        /**
         * This method sends data from controller to the view
         * May move this to the Controller abstract class in the near future
         * 
         * @param string $ViewName
         * @param array The $Data param allow you to pass data from Controller to View
         */
        static function SendToView($ViewName, $Data = []): void
        {
            extract($Data);
            require_once(__DIR__.'/../Views/'.$ViewName.'.php');
        }


        /**
         * @param string @PathName
         */
        static function Redirect($PathName): void
        {
            header('Location'.$_SERVER['SERVER_NAME'].'/'.$PathName);
        }


        public static function Back()
        {
            header('Location:'.$_SERVER['HTTP_REFERER']);
        }
    }
    
?>