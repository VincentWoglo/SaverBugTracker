<?php
    namespace SaverBugTracker\Model;

    use SaverBugTracker\Routes\Loader;
    use SaverBugTracker\Model\Connection;
    
    class DeleteProject extends Connection
    {
        /** @var const */
        private const ZERO = 0;

        /** @var string */
        private $ProjectId; 

        /**
         * @param string $ProjectId
         */
        public function __construct($ProjectId)
        {
            $this->ProjectId = $ProjectId;
        }


        /**
         * Refactor and use query builder
         * Use fetchAll() to retreave all data
         * 
         * @return object Result for query
         */
        private function GetProjectIdFromDatabase(): object
        {
            $ResultForQuery = $this->Connect()->prepare("SELECT * FROM projects WHERE Project_Id = :Project_Id");
            header("Cache-Control: no-cache, must-revalidate, max-age=0");
            $ResultForQuery->execute(['Project_Id' => $this->ProjectId]);

            return $ResultForQuery;
        }
        

        /**
         * @return int Total of the amount of time the ProjectId appear
         */
        public function TotalCountOfProjectId(): int
        {
            return $this->GetProjectIdFromDatabase()->rowCount();
        }
        

        /**
         * Checks if there is a ProjectId in database
         * 
         * @return bool Returns true if ProjectId exist and false if not
         */
        public function ProjectExistInDatabase(): bool
        {
            if ($this->TotalCountOfProjectId() > self::ZERO)
                return true;
            
            return false;
        }


        /**
         * @return string $ValidatedPRojectId
         */
        public function ValidateProjectId(): string
        {
            $ValidatedPRojectId = htmlspecialchars($this->ProjectId);
            
            return $ValidatedPRojectId;
            //check if any script file has been attahced with the ID
        }


        public function DeleteProject(): void
        {
            $DeleteProject = $this->Connect()->prepare("DELETE FROM projects WHERE Project_Id = :Project_Id");
            header("Cache-Control: no-cache, must-revalidate, max-age=0");
            $DeleteProject->execute(['Project_Id' => $this->ProjectId]);
        }


        private function IsProjectDeleted(): bool
        {
            //Type bool
        }
    }
?>