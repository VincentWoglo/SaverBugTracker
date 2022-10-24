<?php
    namespace SaverBugTracker\Model;
    use Dotenv\Dotenv;
    use PDO;
    include (__DIR__.'/../vendor/autoload.php');
    $dotenv = Dotenv::createImmutable(__DIR__, ".env.Connection");
    $dotenv->load();

    class TrackBugs extends Connection
    {
        private $bugField;
        function addNewBug()
        {
            $this->$bugField = func_get_args();
        }
    }
?>