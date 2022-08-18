<?php
    namespace SaverBugTracker\Model;
    session_start();
    use SaverBugTracker\Model\Connection;

    class CRUD extends Connection{

        //Paremeter is an array of key value pairs
        function InsertNewUser($UserInformation){
            $DatabaseConnection = new Connection;
            $Connection = $DatabaseConnection->Connect();

            $Data = [
                "UserId" => $UserInformation["id"],
                "Email" => $UserInformation["Email"],
                "FirstName" => $UserInformation["FirstName"],
                "LastName" => $UserInformation["LastName"],
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

        static function CreateProject($UserInformation){
            $DatabaseConnection = new Connection;
            $Connection = $DatabaseConnection->Connect();
            
            $Data = [
                "Project_Id" => $UserInformation["Project_Id"],
                "Project_Title" => $UserInformation["Project_Title"],
                "Time_Created" => $UserInformation["Time_Created"],
                "Project_Created_By" => $UserInformation["Project_Created_By"],
                "User_Id"=> $UserInformation['User_Id'],
                "Project_Manager" => $UserInformation['Project_Manager'],
            ];
            
            $DataToBeInsertedIntoDatabase = "INSERT INTO projects (Project_Id, Project_Title, Time_Created, Project_Created_By, User_Id, Project_Manager) VALUES (:Project_Id, :Project_Title, :Time_Created, 
            :Project_Created_By, :User_Id, :Project_Manager)";
            header("Cache-Control: no-cache, must-revalidate, max-age=0");
            $InsertIntoDatabase = $Connection->prepare($DataToBeInsertedIntoDatabase);
            $InsertIntoDatabase->execute($Data);
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