<?php
    include __DIR__."/../vendor/autoload.php";
    use SaverBugTracker\Controller\Login;
    session_start();

    use SaverBugTracker\Auth\GoogleAuth;
    GoogleAuth::AuthenticateUser();
    //Login::RedirectLink();
    //var_dump($_SERVER['Profile']->fetchAccessTokenWithAuthCode($_GET['code']));

    $loader = new \Twig\Loader\FilesystemLoader('../Views/Template');
    $twig = new \Twig\Environment($loader);
    echo $twig->render("Index.html", [
        "Hello" => "Hello World"
    ]);
?>