<?php
    use SaverBugTracker\Routes\Loader;
    use SaverBugTracker\Controller\DeleteProjectController;

    error_reporting(1);
    //Documentation: https://github.com/mrjgreen/phroute

    use Phroute\Phroute\RouteCollector;
    $router = new RouteCollector;

    //Group These Routes and add middleware and auth
    $router->get("/", function(){
        Loader::View("index");
    });
    $router->get("/index/", function(){
        Loader::View("index");
    });

    //Group These Routes and add middleware and auth
    $router->get("/login/", function(){
        Loader::View("Login");
    });
    $router->get("/logout/", function(){
        Loader::View("Logout");
    });

    //https://laracasts.com/discuss/channels/laravel/how-to-call-a-laravel-controller-function-outside-laravel-framework
    //https://www.vincecampanale.com/blog/2017/06/07/new-keyword/
    $router->get("/home/delete/{id}", function($id){
        Loader::Controller("DeleteProjectController@RemoveProject", ['ProjectId' => $id, 'dkf'=>'sdf']);
        //This class shouild be loaded in the Loader::Controller();
        // $DeleteProject = new DeleteProjectController('9b3a383e734e3dd014c8b7ad27c5a894');
        // $DeleteProject->PremanentelyRemoveProject();
    });

    //Group These Routes and add middleware and auth
    $router->get("/home/dashboard/", function(){
        Loader::View("Dashboard");
    });
    $router->get("/home/trackbugs/", function(){
        Loader::View("CreateProject");
    });
    $router->get("/home/trackbugs/{id:a}/", function($id){
        Loader::View("TrackBugs");
    });
    $router->get("/home/trackbugs/{id:a}/edit/", function($id){
        Loader::View("Edit");
    });


    try{
        $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
    }
    catch(Phroute\Phroute\Exception\HttpRouteNotFoundException $e){
        Loader::View("404");
    }
 

    //Look into routes.yaml for twig
    //https://www.youtube.com/watch?v=YVy0ttwgYd8

?>