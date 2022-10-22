<?php
    include __DIR__."/../vendor/autoload.php";
    session_start();

    $loader = new \Twig\Loader\FilesystemLoader('../Views/Template');
    $twig = new \Twig\Environment($loader);
    echo $twig->render("Login.html", []);
?>