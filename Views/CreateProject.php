<?php
    session_start();
    use SaverBugTracker\Controller\CreateProject;

    $CreateProject = new CreateProject;
    $DisplayProjects = $CreateProject->DisplayProjects($_SESSION["UserInformation"]->id);

    $loader = new \Twig\Loader\FilesystemLoader('../Views/Template');
    $twig = new \Twig\Environment($loader, [
        'debug' => true,
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());
    echo $twig->render("CreateProject.html", [
        "UserInformation" => $_SESSION["UserInformation"],
        "DisplayProjects" => $DisplayProjects
    ]);
?>