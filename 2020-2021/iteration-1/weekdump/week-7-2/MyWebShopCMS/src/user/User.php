<?php

class User {
    
    public static function auth($userData, $userRoleCollection) {
        
        $_SESSION['user_data']      = array(
            'id'    => $userData['id']
        );
        
        // 
        $_SESSION['user_role']      = $userRoleCollection;
        
        $_SESSION['is_loged_in']    = true;        
    }
    
    
    public static function isAuthenticated() {
        return isset($_SESSION['is_loged_in']) && 
               $_SESSION['is_loged_in'] == true;
    }
    
    public static function isGuest() {
        return !self::isAuthenticated();
    }
    
    public static function hasRoleUser() {
        // TODO 
    }
    
    public static function hasRoleModerator() {
        // TODO 
    }    
    
    public static function hasRoleAdmin() {
        // TODO 
    }        
}