<?php
    session_start();
    include __DIR__."/../vendor/autoload.php";

    if(!$_SESSION["UserInformation"]){
        header("Location:http://localhost/SaverBugTracker/index");
    }
    
    $loader = new \Twig\Loader\FilesystemLoader('../Views/Template');
    $twig = new \Twig\Environment($loader, [
        'debug' => true,
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());
    echo $twig->render("Dashboard.html", [
        "Hello" => "Hello World",
        "UserInformation" => $_SESSION["UserInformation"],
    ]);
?>