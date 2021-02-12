<?php

class Database {
    
    private static $databaseConnection = null;
    private static $queryBuilderString = "";

    static function str($param) {
        return "'$param'";
    }

    static function query($sqlQuery) {
        
        $databaseConnection = self::getConnection();
        $result = mysqli_query($databaseConnection, $sqlQuery);
        
        if(!$result) {
            
            echo '<div class="query">';
            echo $sqlQuery;
            echo mysqli_error($databaseConnection);
            echo '</div>';    
        }
        
        return $result;
    }

    // TODO : implement when PHP classes are introduces
    static function getLastInsertedId() {
        
        self::$databaseConnection = self::getConnection();
        return mysqli_insert_id(self::$databaseConnection );
    } 
    
    static function fetchQuery($query) {

        $resultArray    = array();
        $fetchResponse  = self::query($query);
        
        while($data = mysqli_fetch_assoc($fetchResponse)) {
            array_push($resultArray, $data);
        }

        return $resultArray;        
    }

    
    static function select($tableName, $columnCollection = array()) {
     
        $selectColumn = "*";
        if(count($columnCollection) > 0) {
            $selectColumn = implode(",", $columnCollection);
        }
        self::$queryBuilderString .= "SELECT $selectColumn FROM $tableName ";
        return __CLASS__;
    }



    static function insert($tableName, $queryPropertyCollection) {
            
        $queryKeies     = "";
        $queryValues    = "";

        foreach ($queryPropertyCollection as $key => $value) {
            
            $queryKeies .= ($key . ",");
            $queryValues .= ($value . ",");
        }
                
        $queryKeies     = substr($queryKeies, 0, strlen($queryKeies) - 1);
        $queryValues    = substr($queryValues, 0, strlen($queryValues) - 1);
        
        $query = "INSERT INTO $tableName($queryKeies) VALUES($queryValues)";
        
        self::query($query);
    }
    
    // UPDATE {table_name} 
    // SET column1 = value1, column2 = value2
    static function update($tableName, $queryPropertyCollection) {
        
        $updateQueryKeyValue = "";
        foreach ($queryPropertyCollection as $key => $value) {
            $updateQueryKeyValue .= "$key = $value,";
        }
        
        $updateQueryKeyValue = substr($updateQueryKeyValue, 0, strlen($updateQueryKeyValue) - 1);
        $query = "UPDATE $tableName SET $updateQueryKeyValue ";
        // self::query($query);
        self::$queryBuilderString .= " $query";
        return __CLASS__;
    }
    
    
    static function helloWorld() {
        echo "** Hello world from inner function **";
    }


    // DELETE {table_name}
    // WHERE []
    static function delete($tableName) {
        
        $query = "DELETE $tableName";
        self::query($query);
    }
    
    static function where($queryPropertyCollection) {
        // WHERE a = ? AND / OR b = ?
        
        $whereQuery;
        $whereQueryArray = array();
        foreach ($queryPropertyCollection as $key => $value) {
            // $whereQuery .= "$key = $value";
            array_push($whereQueryArray, ("$key = $value"));
        }
        
        $whereQuery = implode(" AND ", $whereQueryArray);
        $query = "WHERE $whereQuery";
        self::$queryBuilderString .= $query;
                
        return __CLASS__;
    }
    
    /**
     * 
     * @return array
     */
    static function fetch() {

        $resultArray    = array();
        $fetchResponse  = self::query(self::$queryBuilderString);
        
        while($data = mysqli_fetch_assoc($fetchResponse)) {
            array_push($resultArray, $data);
        }
        
        // remove query data before next query
        self::$queryBuilderString = "";
        return $resultArray;
    }
    
    /**
     * 
     * @return array
     */
    static function fetchSingle() {

        $collection = self::fetch();
        return (count($collection)) ? $collection[0] : array();
    }    
    
    /**
     * 
     */
    static function execute() {
        
        // remove query data before next query        
        self::query(self::$queryBuilderString);
        self::$queryBuilderString = "";
    }
    
    // Give me the curtrent database connectuion
    private static function getConnection() {
        
        if(self::$databaseConnection == null) {
           self::$databaseConnection = self::connect(); 
        }
        
        return self::$databaseConnection;
    }

    // 1. Connection to Database - MySQL
    // 2. Prepare query 
    // 3. Manipulation of screen data
    private static function  connect() {
        
        define('HOST'       , 'localhost');
        define('USERNAME'   , 'root');
        define('PASSWORD'   , 'password');
        define('DBNAME'     , 'cms');
        define('PORT'       , '3306');   
        
        
        return mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME, PORT);
    }
}


