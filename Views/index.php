<?php
    session_start();
    include __DIR__."/../vendor/autoload.php";
    use SaverBugTracker\Controller\Login;

    use SaverBugTracker\Auth\GoogleAuth;
    GoogleAuth::AuthenticateUser();
    
    $loader = new \Twig\Loader\FilesystemLoader('../Views/Template');
    $twig = new \Twig\Environment($loader);
    echo $twig->render("Index.html", [
        "Hello" => "Hello World",
        "UserInformation" => $_SESSION["UserInformation"]
    ]);
?>