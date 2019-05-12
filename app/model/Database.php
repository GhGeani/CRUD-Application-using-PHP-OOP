<?php


class Database {
    
    private $port;
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    private function connect() {

        $config = require('app/resources/config/database.php');
        $this->servername = $config['servername'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->dbname = $config['dbname'];
        $this->port = $config['port'];
        $this->charset = $config['charset'];

        try {
            $dsn = 'mysql:host='.$this->servername.';dbname='.$this->dbname.';charset='.$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Connection failed: '.$e->getMessage();
        }
    }

    protected function readDatas($table) {
        $stmt = $this->connect()->prepare('select * from '.$table.';');
        $stmt->execute();
        if($stmt->rowCount()){
            return $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    protected function createRow($table, $data) {
        $columns = array_keys($data);
        $columnsSqlFormat = implode(',', $columns);
        $bindingSql = ':'.implode(',:', $columns);
        $query = "insert into $table ($columnsSqlFormat) values ($bindingSql);";
        $stmt = $this->connect()->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindValue(':'.$key, $value);
        }
        $stmt->execute();
        
    }

    protected function deleteRow($table, $id) {
        $query = "delete from $table where id=$id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
    }

    protected function updateRow($table, $data, $id) {
        $columns = array_keys($data);
        // query will be like that: "update $table set c1=:c1, c2=:c2, etc.. where id=$id"

        $columnsMapped = array_map(function($value){
            return $value.'=:'.$value;
        },$columns);
        $bindingSql = implode(',',$columnsMapped);
        $query = "update $table set $bindingSql where id=$id;";
        $stmt = $this->connect()->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindValue(':'.$key, $value);
        }
        $stmt->execute();
        
    }
}
?>