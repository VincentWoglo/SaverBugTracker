<?php
    include (__DIR__.'/../vendor/autoload.php');
    use SaverBugTracker\Routes\Loader;

    error_reporting(1);
    //Documentation: https://github.com/mrjgreen/phroute

    use Phroute\Phroute\RouteCollector;
    $router = new RouteCollector;

    $router->get("/", function(){
        Loader::View("index");
    });
    $router->get("/app", function(){
        Loader::View("app");
    });
    $router->get("/Controller", function(){
        require("../Controller/.php");
    });

    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
    // Print out the value returned from the dispatched function
    //echo $response;
?>