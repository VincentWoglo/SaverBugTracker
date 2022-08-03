<?php
    namespace SaverBugTracker\Auth;
    use Dotenv\Dotenv;
    use Google_Client;
    use Google_Service_Oauth2;
    $dotenv = Dotenv::createImmutable(__DIR__, ".env.Credentials");
    $dotenv->load();
    session_start();

    class GoogleAuth
    {
      static function AuthenticateUser(){
        echo $_GET['code'];
        echo "Hello World";
        if($_GET['code']){
          $Client = new Google_Client();
            $ClientID = $_ENV['ClientID'];
            $ClientSecret = $_ENV['ClientSecret'];
            $RedirectUri = $_ENV['RedirectUri'];
            
            $Client->setClientId($ClientID);
            $Client->setClientSecret($ClientSecret);
            $Client->setRedirectUri($RedirectUri);
            $Client->addScope("email");
            $Client->addScope("profile");
            $UserResult = $Client->fetchAccessTokenWithAuthCode($_GET['code']);
            $ClientAccessToken = $UserResult['access_token'];
            $Client->setAccessToken($ClientAccessToken);

            $ClientService = new Google_Service_Oauth2($Client);
            $UserInformation = $ClientService->userinfo->get();
            var_dump(json_encode($UserInformation));
        }
      }                   
    }
?>