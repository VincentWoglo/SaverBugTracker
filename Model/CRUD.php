<?php
    namespace SaverBugTracker\Model;
    session_start();
    use SaverBugTracker\Model\Connection;

    class CRUD extends Connection{

        //Paremeter is an array of key value pairs
        static function InsertNewUser($USerInformation){
            
        }

        static function InsertNewProject(){
            
        }

        static function GetUserInformation($UserId){
            $DatabaseConnection = new Connection;
            $Connection = $DatabaseConnection->Connect();
            
            $GetUserIdFromDatabase = $Connection->prepare("SELECT * FROM users WHERE id = :UserId");
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



<!-- function GetUserInformation($UserId){
            //echo $UserId;
            $Connection = $this->Connect();
            $GetUserIdFromDatabase = $Connection->prepare("SELECT * FROM users WHERE id = :UserId");
            $GetUserIdFromDatabase->execute([
                "UserId" => $UserId
            ]);
            //Return #GetUserIdFromDatabase and create function to fetch and to get the row count of the user
            $RecieveUserIdFromDatabase = $GetUserIdFromDatabase->fetch();
            $RowCount = $GetUserIdFromDatabase->rowCount();
            echo $RowCount;
            return $RecieveUserIdFromDatabase;
        } -->