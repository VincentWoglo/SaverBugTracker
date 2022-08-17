<?php
    namespace SaverBugTracker\Controller;
    use Dotenv\Dotenv;
    include __DIR__."/../vendor/autoload.php";
    $dotenv = Dotenv::createImmutable(__DIR__."/../Auth", ".env.Credentials");
    $dotenv->load();
    session_start();

    class CreateProject
    {
        public function CreateNewProject(){
            $ProjectTitleInput = htmlspecialchars_decode(trim($_REQUEST['ProjectTitleInput']));
        }
    }

    $CreateProject = new CreateProject;
    $New = $CreateProject->CreateNewProject();
?>