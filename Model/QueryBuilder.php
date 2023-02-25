<?php
    namespace SaverBugTracker\Model;
    use PDO;

    class QueryBuilder extends Connection
    {
        private $selectQuery; private $from;
        
        public function select(){
            $selection = func_get_args();
            $value = '';
            $numberOfFields = 1;

            foreach($selection as $field){
                $value .= $field;
                //add commas if the selection is more than one
                if($numberOfFields < count($selection))
                    $value .= ", ";
            }
            $this->$selectQuery = "select {$value}";
            
            return $this->$selectQuery;
        }

        public function from(){
            $selection = func_get_args();
        }
    }
?>