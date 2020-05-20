<?php

namespace config;

class Config {
    
    public static function db($dbHandler = null) {
        
        return array(
            'db_host' => 'localhost',
            'db_user' => 'root',
            'db_name' => 'public_board',
            'db_pass' => ''
        );
    }
}