<?php

class Database {

    private static $dbConnection = NULL;
    private static $queryBuilder = "";
    
    
    
    static function dbConnect() {
        
        if(Database::$dbConnection == NULL) {
           Database::$dbConnection  =  mysqli_connect("localhost", "root", "", "mycms");
        }
        
        return Database::$dbConnection;
    }

    static function query($query) { 

        $connection = Database::dbConnect();

        if(!$connection) {
            echo mysqli_connect_error();
            return;
        }

        $databaseResult = mysqli_query($connection, $query);

        if(!$databaseResult) {
            echo '<div class="db-error">';
            echo mysqli_error($connection);
            echo '</div>';
        }

        return $databaseResult;
    }
        
    public static function select($tableName, $tableColumnCollection = array()) {
        
        self::$queryBuilder = "SELECT ";
        
        if(count($tableColumnCollection) > 0) {
            self::$queryBuilder = self::$queryBuilder . implode(', ', $tableColumnCollection);
        }
        else {
            self::$queryBuilder = self::$queryBuilder  . " * ";
        }
        
        self::$queryBuilder = self::$queryBuilder  . " FROM $tableName";
        
        return self::class;
    }
    
    /**
     * 
     * @param type $columnRelation
     * @return \Database
     */
    public static function where($column, $value) {
        
        $whereQuery = " WHERE $column = '$value'";
        
        self::$queryBuilder = self::$queryBuilder . $whereQuery;
        return self::class;
    }
    
    /**
     * 
     * @param type $columnRelation
     * @return \Database
     */
    public static function orWhere($column, $value) {
        
        $whereQuery = " OR $column = '$value' ";
        
        self::$queryBuilder = self::$queryBuilder . $whereQuery;
        return self::class;
    }    
    
    /**
     * 
     * @param type $columnRelation
     * @return \Database
     */
    public static function andWhere($column, $value) {
        
        $whereQuery = " AND $column = '$value' ";
        
        self::$queryBuilder = self::$queryBuilder . $whereQuery;
        return self::class;
    }        
    

    
    /**
     * 
     * @return type
     */
    public static function build() {
        return self::getAll(self::$queryBuilder);
    }
    
    /**
     * 
     * @return Database
     */
    public static function buildSingle() {
        return self::get(self::$queryBuilder);
    }    

    /**
     * This function returns last id
     * @name getLastInsertedId
     * @author Mihail Petrov
     * @return type
     */
    static function getLastInsertedId() { 
        return mysqli_insert_id(Database::dbConnect());
    }
    
    /**
     * 
     * @param type $databaseQuery
     * @return type
     */
    static function get($databaseQuery) {
        
        $databaseResultSet = Database::query($databaseQuery);
        return mysqli_fetch_assoc($databaseResultSet);
    }
    
    /**
     * 
     * @param type $databaseQuery
     * @return array
     */
    static function getAll($databaseQuery) {
        
        $resultCollection   = array();
        $databaseResultSet  = Database::query($databaseQuery);
        while($result = mysqli_fetch_assoc($databaseResultSet)) {
            array_push($resultCollection, $result);
        }
        
        return $resultCollection;
    }
    
    /**
     * 
     * @param type $databaseResultSet
     * @return type
     */
    static function fetch($databaseResultSet) {
        return mysqli_fetch_assoc($databaseResultSet);
    }
    
    /**
     * 
     * @param type $tableName
     * @return type
     */
    static function count($tableName) {
        
        $databaseQuery = "SELECT COUNT(*) AS count FROM $tableName";
        return Database::get($databaseQuery)['count'];
    }
    
    /**
     * 
     * @param type $tableName
     * @param type $columnCollection
     * @return type
     */
    static function insert($tableName, $columnCollection) {
   
        $queryBuilder = "INSERT INTO $tableName (";
        foreach ($columnCollection as $key => $value) {
            $queryBuilder .= $key . ',';
        }
        $queryBuilder = substr_replace($queryBuilder, ")", strlen($queryBuilder) - 1);
        $queryBuilder .= ' VALUES(';
        
        foreach ($columnCollection as $key => $value) {
            $queryBuilder .= '\'' . $value . '\',';
        }
        $queryBuilder = substr_replace($queryBuilder, ")", strlen($queryBuilder) - 1);
        
        return Database::query($queryBuilder);
    }
    
    /**
     * 
     * @param type $tableName
     * @param type $columnCollection
     * @param type $whereCollection
     * @return type
     */
    static function update($tableName, $columnCollection, $whereCollection ) {
        
        $queryBuilder = "UPDATE $tableName SET ";
        
        foreach ($columnCollection as $key => $value) {
            $queryBuilder .= "$key = '$value',";
        }
        
        $queryBuilder  = substr_replace($queryBuilder, " ", strlen($queryBuilder) - 1);
        $queryBuilder .= " WHERE ";
        foreach ($whereCollection as $key => $value) {
            $queryBuilder .= "$key = '$value',";
        }        
        
        $queryBuilder = substr_replace($queryBuilder, " ", strlen($queryBuilder) - 1);
        return $queryBuilder;
    }
    
    /**
     * 
     * @param type $tableName
     * @param type $whereCollection
     * @return type
     */
    static function delete($tableName, $whereCollection) {
        
        $queryBuilder = "DELETE FROM $tableName WHERE ";
        
        foreach ($whereCollection as $key => $value) {
            $queryBuilder .= "$key = '$value',";
        }                   
        
        $queryBuilder = substr_replace($queryBuilder, " ", strlen($queryBuilder) - 1);
        return $queryBuilder;
    }
}