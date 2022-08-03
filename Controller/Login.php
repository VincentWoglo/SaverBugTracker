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
            var_dump($Client);


            $LoginUrl = $Client->createAuthUrl();
            header("Location:".$LoginUrl);
        }
        static function RedirectLink(){
            $Client = new Google_Client();
            var_dump($Client);
        }

        static function AuthenticateLogin(){

            self::GoogleLogin();
            GoogleAuth::AuthenticateUser();
            // echo $Client->fetchAccessTokenWithAuthCode($_GET['code']);
            // $UserResult = GetAccessToken($_ENV['ClientID'], $_ENV['RedirectUri'], $_ENV['ClientSecret'], $_GET['code']);
            // $User = $UserResult['access_token'];
            // echo GetUserProfileInfo($User);
            
        }
    }
    
    Login::AuthenticateLogin();
?>