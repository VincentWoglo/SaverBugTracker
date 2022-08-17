<?php
    namespace SaverBugTracker\Auth;
    use Dotenv\Dotenv;
    use Google_Client;
    use Google_Service_Oauth2;
    use SaverBugTracker\Model\CRUD;
    session_start();

    $dotenv = Dotenv::createImmutable(__DIR__, ".env.Credentials");
    $dotenv->load();

    class GoogleAuth
    {
      //Sign the user in after they choose account from google's prompted window
      //Store the user's inforrmation within a session
      static function IfUserExist($CurrentUserId){
        //Select user from database
        //Check if the current user exist by their Id
      }
      
      static function StoreUserInDatabase(){}
      
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

            //Check if the user already exist
            $UserId = $_SESSION["UserInformation"]->id;
            $CRUD = new CRUD;
            $DoesUserExistInDatabase = $CRUD->DoesUserExistInDatabase($UserId);
            
            if($DoesUserExistInDatabase === 0)
            {
              echo "User Doesn't Exist";
            }
            //Insert user information into database if the user doesn't already exist
            //Finally Redirect Users to index page
          }
          catch(\InvalidArgumentException $e){}
        }
      }   

      static function RedirectUserHome(){
        header("Location:".$_ENV['RedirectUri']);
      }
      //Resources: https://programmierfrage.com/items/refresh-token-with-google-api-client-not-working
      //https://googleapis.github.io/google-api-php-client/v2.8.1/Google/Client.html
    }
?>