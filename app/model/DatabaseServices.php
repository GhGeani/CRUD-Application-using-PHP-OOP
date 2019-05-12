<?php 

    include_once 'Database.php';

    class DatabaseServices extends Database {

        protected function create($table, $data) {
            return $this->createRow($table, $data);
        }

        protected function read($tableName) {
            return $this->readDatas($tableName);
        }

        protected function update($table, $array, $id) {
            return $this->updateRow($table, $array, $id);
        }
        
        protected function delete($table, $id) {
            return $this->deleteRow($table, $id);
        }
    }
    ?>