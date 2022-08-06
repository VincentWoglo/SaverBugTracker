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

          try{
            $FetchAccessToken = $Client->fetchAccessTokenWithAuthCode($_GET['code']);
            $ClientAccessToken = $FetchAccessToken['access_token'];
            $Client->setAccessToken($ClientAccessToken);
  
            $ClientService = new Google_Service_Oauth2($Client);
            $UserInformation = $ClientService->userinfo->get();
  
            //Store $UserInformation in the local storage and in the database
            $_SESSION["UserInformation"] = $UserInformation;
          }
          catch(\InvalidArgumentException $e){
          }
        }
      }   

      static function RedirectUserHome(){
        header("Location:".$_ENV['RedirectUri']);
      }
      
      //Resources: https://programmierfrage.com/items/refresh-token-with-google-api-client-not-working
      //https://googleapis.github.io/google-api-php-client/v2.8.1/Google/Client.html
    }
?>