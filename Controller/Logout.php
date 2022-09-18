<?php
    namespace SaverBugTracker\Controller;
    include __DIR__."/../vendor/autoload.php";
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__."/../Auth", ".env.Credentials");
    $dotenv->load();
    session_start();

    class Logout
    {
        function ClientLogout(){
            if($_SESSION["UserInformation"] !== NULL){
                unset($_SESSION["UserInformation"]);
                header("Location:". $_ENV['RedirectUri']);
            }
            else{
                header("Location:". $_ENV['RedirectUri']);
            }
        }
    }
?>