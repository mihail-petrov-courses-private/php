<?php

class Database {
    
    private $dbConnection;
    private $lastExecutedQuery = null;
    private $executeError      = null;
    private $resultCollection  = null;
    
    private static $instance   = null;
        
    // Singleton : Designe pattern 
    // * check online for more information 
    public static function getInstance() {
        
        if(!Database::$instance) {
            Database::$instance =  new Database();
        }
        
        return Database::$instance;
    }
    
    
    private function __construct() {
        
        $dbHandler    = NULL;
        $dbHost       = Config::db($dbHandler)['db_host'];
        $dbName       = Config::db($dbHandler)['db_name'];
        $dbUser       = Config::db($dbHandler)['db_user'];
        $dbPass       = Config::db($dbHandler)['db_pass'];
        
        $this->dbConnection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    }
    
    public function query($query) {
        
        $this->lastExecutedQuery = $query;
        $this->resultCollection  = $this->dbConnection->query($query);
        return $this->resultCollection;
    }
    
    public function fetch() {
        return $this->resultCollection->fetch_assoc();
    }

    public function lastExecutedQuery() {
        return $this->lastExecutedQuery;
    }
    
    public function showError() {
        
        if(empty($this->executeError)) {
            $this->executeError = $this->dbConnection->error;
        }
        
        return $this->executeError;
    }
    
    public function lastInsertedId() {
        return $this->dbConnection->insert_id;
    }
}