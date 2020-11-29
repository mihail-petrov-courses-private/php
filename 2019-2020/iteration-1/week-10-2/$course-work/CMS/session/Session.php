<?php

namespace session;

class Session {
    
    public static function setFlashMessage($key, $message) {
        $_SESSION[$key] = $message;
    }
   
    public static function checkFlashMessage($key) {
        return isset($_SESSION[$key]);
    }

    // check and return 
    public static function getFlashMessage($key) {
        
        if(isset($_SESSION[$key]) && !is_null($_SESSION[$key])) {
            
            $flashMessage = $_SESSION[$key];
            $_SESSION[$key] = NULL;
            
            return $flashMessage;
        }
    }
}