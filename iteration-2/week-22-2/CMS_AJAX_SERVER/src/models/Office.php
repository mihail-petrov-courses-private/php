<?php

class Office {
    
    private static $tableName = 'offices';
    
    public static function getAll() {
        return Database::select(self::$tableName)::build();
    }
}