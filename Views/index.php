<?php
    $loader = new \Twig\Loader\FilesystemLoader('../Views/Template');
    $twig = new \Twig\Environment($loader);
    echo $twig->render("index.html", [
        "Hello" => "Hello World"
    ]);
?>