<?php

class User {
    
    public static function login() {
        // TODO 
    }
    
    // NB: return User object 
    // NB : who is going to manage the session
    public static function registration($username, $email, $password) {
        
        Database::getInstance()->query("INSERT INTO cms.users(username, email, password, role) 
                        VALUES('{$username}', '{$email}', '{$password}', 1)");
                        
        if(Database::getInstance()->lastInsertedId()) {
            return true;
        }
        
        return false;
    }
    
    public static function logout() {
        // TODO         
    }
}