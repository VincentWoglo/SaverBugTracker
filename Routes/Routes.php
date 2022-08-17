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
    $router->get("/index", function(){
        Loader::View("index");
    });
    $router->get("/login", function(){
        Loader::View("Login");
    });
    $router->get("/app", function(){
        Loader::View("app");
    });
    $router->get("/logout", function(){
        Loader::View("Logout");
    });
    $router->get("/dashboard", function(){
        Loader::View("Dashboard");
    });
    $router->get("/dashboard/trackbugs", function(){
        Loader::View("CreateProject");
    });
    $router->get("/dashboard/trackbugs/{id:a}", function($id){
        Loader::View("TrackBugs");
    });


    try{
        $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
    }
    catch(Phroute\Phroute\Exception\HttpRouteNotFoundException $e){
        Loader::View("404");
    }
 
?>