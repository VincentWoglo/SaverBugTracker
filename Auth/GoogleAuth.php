<?php
    namespace SaverBugTracker\Auth;
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__, ".env.Credentials");
    $dotenv->load();

    class GoogleAuth
    {
      static function Auth(){
        echo $_GET['code'];
        echo "Hello World";
      }                   
    }
?>