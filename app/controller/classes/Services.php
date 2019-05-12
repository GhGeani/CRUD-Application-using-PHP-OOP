<?php

    require_once 'app/model/DatabaseServices.php';

    class ServiceController extends DatabaseServices
    {   
        private $tableName;

        public function __construct() {
            $this->tableName = 'services';
        }

        public function save($data) {
           $this->create($this->tableName, $data);
        }
        
        public function readInfos(){
            return $this->read($this->tableName);
        }

        public function deleteInfo($id) {
            return $this->delete($this->tableName, $id);
        }
        public function updateInfo($data, $id) {
            return $this->update($this->tableName, $data, $id);
        }
    }
?>


