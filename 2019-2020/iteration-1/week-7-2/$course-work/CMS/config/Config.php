<?php

class Config {
    
    // public const DB_HOST = 'localhost';
    // public const DB_USER = 'root';
    // public const DB_NAME = 'cms';
    // public const DB_PASS = '';
    
    public static function db($dbHandler = null) {
        
        if($dbHandler == 'test') {
            
            return array(
                'db_host' => 'localhost',
                'db_user' => 'root',
                'db_name' => 'cms_test',
                'db_pass' => ''
            );            
        }
        
        if($dbHandler == 'prod') {
            
            return array(
                'db_host' => 'localhost',
                'db_user' => 'root',
                'db_name' => 'cms_prod',
                'db_pass' => ''
            );            
        }        
        
        return array(
            'db_host' => 'localhost',
            'db_user' => 'root',
            'db_name' => 'cms',
            'db_pass' => ''
        );
    }
}