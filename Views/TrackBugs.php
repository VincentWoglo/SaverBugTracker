<?php
    session_start();
    include __DIR__."/../vendor/autoload.php";
    
    $loader = new \Twig\Loader\FilesystemLoader('../Views/Template');
    $twig = new \Twig\Environment($loader, [
        'debug' => true,
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());
    echo $twig->render("TrackBugs.html", [
        "UserInformation" => $_SESSION["UserInformation"]
    ]);
?>