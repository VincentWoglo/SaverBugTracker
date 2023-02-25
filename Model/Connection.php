<?php
    namespace SaverBugTracker\Model;
    use Dotenv\Dotenv;
    use PDO;
    include (__DIR__.'/../vendor/autoload.php');
    $dotenv = Dotenv::createImmutable(__DIR__, ".env.DB_Connection");
    $dotenv->load();

    class Connection
    {
        protected $Connection;
        
        public function __construct()
        {
            $this->Connection;
        }
    

        /**
         * Returns database connection
         */
        protected function Connect()
        {
            try
            {
                $this->Connection = new PDO("mysql:host=".$_ENV['HOST'].";dbname=".$_ENV['DBNAME'], $_ENV['USER'], $_ENV["PASSWORD"]);
                $this->Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->Connection;
            }


            catch (PDOException $error)
            {
                echo "Please check you connection" .$error->getMessage();
            }
        }
    }
?>