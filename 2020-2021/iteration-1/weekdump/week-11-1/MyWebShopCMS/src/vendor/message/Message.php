<?php

namespace src\client\vendor\message;

class Message {
    
    private static $messageCollection = array();
    
    public static function get($key) {
        
        if(array_key_exists($key, self::$messageCollection)) {
            return self::$messageCollection[$key] ;
        }
    }
    
    public static function set($key, $value) {
        self::$messageCollection[$key] = $value;
    }
    
    
    public static function print($key) {
        echo self::get($key);
    }
}