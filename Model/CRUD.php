<?php
    namespace SaverBugTracker\Model;
    session_start();
    use SaverBugTracker\Model\Connection;

    class CRUD extends Connection{

        //Paremeter is an array of key value pairs
        function InsertNewUser($USerInformation){
            $DatabaseConnection = new Connection;
            $Connection = $DatabaseConnection->Connect();
            
            $Data = [
                "UserId" => $USerInformation["id"],
                "Email" => $USerInformation["Email"],
                "FirstName" => $USerInformation["FirstName"],
                "LastName" => $USerInformation["LastName"],
                "DateJoined"=> date("m/d/Y"),
                "DateOfBirth" => "NULL",
                "TermsOfAgreement" => "NULL",
                "Company" => "NULL"
            ];
            
            $DataToBeInsertedIntoDatabase = "INSERT INTO users (UserId, Email, FirstName, LastName,DateJoined, DateOfBirth,
            TermsOfAgreement, Company) VALUES (:UserId, :Email, :FirstName, :LastName, :DateJoined, :DateOfBirth,
            :TermsOfAgreement, :Company)";
            header("Cache-Control: no-cache, must-revalidate, max-age=0");
            $InsertIntoDatabase = $Connection->prepare($DataToBeInsertedIntoDatabase);
            $InsertIntoDatabase->execute($Data);
        }

        static function InsertNewProject(){
            
        }

        static function GetUserInformation($UserId){
            $DatabaseConnection = new Connection;
            $Connection = $DatabaseConnection->Connect();
            
            $GetUserIdFromDatabase = $Connection->prepare("SELECT * FROM users WHERE UserId = :UserId");
            $GetUserIdFromDatabase->execute([
                "UserId" => $UserId
            ]);
            //Return #GetUserIdFromDatabase and create function to fetch and to get the row count of the user
            return $GetUserIdFromDatabase;
        }

        function FetchUserInformation ($UserId){
            $GetUserIdFromDatabase = self::GetUserInformation($UserId);
            $RecieveUserIdFromDatabase = $GetUserIdFromDatabase->fetch();
            return $RecieveUserIdFromDatabase;
        }

        function DoesUserExistInDatabase ($UserId){
            $GetUserIdFromDatabase = self::GetUserInformation($UserId);
            $RecieveUserIdFromDatabase = $GetUserIdFromDatabase->rowCount();
            return $RecieveUserIdFromDatabase;
        }
        
        static function DeleteUserInformation(){

        }
        
    }
?>