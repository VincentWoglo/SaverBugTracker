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
        function DisplayProjects($Project_Created_By){
            return CRUD::GetProjects($Project_Created_By);
        }

        public function CreateNewProject(){
            $ProjectTitleInput = htmlspecialchars_decode(trim($_REQUEST['ProjectTitleInput']));
            $ProjectId = bin2hex(random_bytes(16));

            $UserInformation = array(
                "Project_Id" => bin2hex(random_bytes(16)),
                "Project_Title" => $ProjectTitleInput ,
                "Time_Created" => date("m/d/Y"),
                "Project_Created_By" => $_SESSION["UserInformation"]->id,
                "User_Id"=> $_SESSION["UserInformation"]->id,
                "Project_Manager" => $_SESSION["UserInformation"]->id
            );

            if(!empty($ProjectTitleInput)){
                CRUD::CreateProject($UserInformation);
            }

            //var_dump(CRUD::GetProjects($_SESSION["UserInformation"]->id));
        }
    }

    $CreateProject = new CreateProject;
    $New = $CreateProject->CreateNewProject();
?>