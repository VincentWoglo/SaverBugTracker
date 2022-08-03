<?php
    namespace SaverBugTracker\Controller;
    include __DIR__."/../vendor/autoload.php";
    use SaverBugTracker\Auth\GoogleAuth;
    use Dotenv\Dotenv;
    use Google_Client;
    $dotenv = Dotenv::createImmutable(__DIR__."/../Auth", ".env.Credentials");
    $dotenv->load();
    session_start();

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
            $_SERVER['Profile'] = $Client;


            $LoginUrl = $Client->createAuthUrl();
            header("Location:".$LoginUrl);
        }

        static function AuthenticateLogin(){

            self::GoogleLogin();
            GoogleAuth::AuthenticateUser();
            
        }
    }
    
    Login::AuthenticateLogin();
?>