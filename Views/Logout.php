<?php
    include __DIR__."/../vendor/autoload.php";
    use SaverBugTracker\Controller\Logout;
    session_start();
    
    $Login = new Logout;
    $Login->ClientLogout();
    
?>