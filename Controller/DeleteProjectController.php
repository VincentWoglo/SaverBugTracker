<?php
    namespace SaverBugTracker\Controller;

    use SaverBugTracker\Routes\Loader;
    use SaverBugTracker\Model\DeleteProject;
    
    class DeleteProjectController{
        
        /**
         * @param string $Data
         */
        public function __construct($Data){
            $this->Data = $Data;
        }


        /**
         * Write the Delete functionality
         * 
         * Check if the object has been deleted
         * Redirect User to the main page
         */
        public function RemoveProject(): void
        {
            $DeleteProjects = new DeleteProject($this->Data['ProjectId']);
            Loader::SendToView('DeleteProject', ['Data'=>'jkdhnfj']);
            //Write the Delete functionality
            if($DeleteProjects->ProjectExistInDatabase() == true)
            {
                $DeleteProjects->DeleteProject();
                Loader::Back();
            }
        }
    }
?>