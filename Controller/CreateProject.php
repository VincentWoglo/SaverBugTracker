<?php
    namespace SaverBugTracker\Controller;
    use SaverBugTracker\Model\CRUD;
    use Dotenv\Dotenv;
    include __DIR__."/../vendor/autoload.php";
    $dotenv = Dotenv::createImmutable(__DIR__."/../Auth", ".env.Credentials");
    $dotenv->load();
    session_start();

    class CreateProject
    {
        public function CreateNewProject(){
            $ProjectTitleInput = htmlspecialchars_decode(trim($_REQUEST['ProjectTitleInput']));

            $UserInformation = array(
                "Project_Id" => bin2hex(random_bytes(16)),
                "Project_Title" => $ProjectTitleInput ,
                "Time_Created" => date("m/d/Y"),
                "Project_Created_By" => $_SESSION["UserInformation"]->id,
                "User_Id"=> $_SESSION["UserInformation"]->id,
                "Project_Manager" => $_SESSION["UserInformation"]->id
            );
            CRUD::CreateProject($UserInformation);
        }
    }

    $CreateProject = new CreateProject;
    $New = $CreateProject->CreateNewProject();
?>