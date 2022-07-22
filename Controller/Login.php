<?php
    //namespace SaverBugTracker\Controller;
    include __DIR__."/../vendor/autoload.php";
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__."/../Auth", ".env.Credentials");
    $dotenv->load();

    class Login
    {
        static function GoogleLogin(){
            $Client = new Google_Client();
            $ClientID = $_ENV['ClientID'];
            $ClientSecret = $_ENV['ClientSecret'];
            $RedirectUri = $_ENV['RedirectUri'];
            
            $Client->setClientId($ClientID);
            $Client->setClientSecret($ClientSecret);
            $Client->setRedirectUri($RedirectUri);
            $Client->addScope("email");
            $Client->addScope("profile");
            $LogIn_Status = "";
           $LoginUrl = $Client->createAuthUrl();

            session_start();
        }
    }
    Login::GoogleLogin();
?>