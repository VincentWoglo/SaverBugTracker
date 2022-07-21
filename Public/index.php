<?php
    include_once(__DIR__.'/../Routes/Routes.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, ".env.example");
    $dotenv->load();
    
    echo $_ENV["SECRET_KEY"];
    echo $_ENV["TITLE"];
?>