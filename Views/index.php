<?php
    include __DIR__."/../vendor/autoload.php";
    use SaverBugTracker\Controller\Login;
    session_start();

    use SaverBugTracker\Auth\GoogleAuth;
    GoogleAuth::AuthenticateUser();
    var_dump($_REQUEST['test']);
    VAR_DUMP($_REQUEST['testING']);
    $loader = new \Twig\Loader\FilesystemLoader('../Views/Template');
    $twig = new \Twig\Environment($loader);
    echo $twig->render("Index.html", [
        "Hello" => "Hello World",
        "UserInformation" => $_SESSION["UserInformation"]
    ]);
?>