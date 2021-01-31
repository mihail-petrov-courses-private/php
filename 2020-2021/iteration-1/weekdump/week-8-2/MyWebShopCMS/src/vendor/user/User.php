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
        return self::getRole() == 'USER';
    }
    
    public static function hasRoleModerator() {
        return self::getRole() == 'MODERATOR';
    }    
    
    public static function hasRoleAdmin() {
        return self::getRole() == 'ADMIN';
    }        
    
    /**
     * 
     * @return type
     */
    private static function getRole() {
        
        if(array_key_exists('user_role', $_SESSION)) {
            return $_SESSION['user_role'][0]['title'];
        }
    }
}