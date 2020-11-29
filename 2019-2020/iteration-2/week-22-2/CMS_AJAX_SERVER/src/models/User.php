<?php

class User {
    
    private static $table       = 'tb_users';
    private static $tableRole   = 'tb_user__role';
    
    public static function doesExists($parameterCollection) {
        
        $collection = Database::select(self::$table)
                ::where('email', $parameterCollection['email'])
                ::orWhere('name', $parameterCollection['name'])                
                ::build();
        
        return (count($collection) > 0);
    }
    
    public static function signup($parameterCollection) {
        
        Database::insert(self::$table, $parameterCollection);
        return Database::getLastInsertedId();
    }
    
    
    public static function get($parameterCollection) {
        
        $userObject = Database::select(self::$table)
                ::where('email', $parameterCollection['email'])
                ::andWhere('password', $parameterCollection['password'])
                ::buildSingle();
        
        if(is_null($userObject)) {
            return NULL;
        }
        
        $userId                     = $userObject['id'];
        $getUserRoleCollectionQuery = " SELECT b.title AS role_title"
                                    . " FROM tb_user__role  AS a, "
                                    . "     tm_roles        AS b "
                                    . " WHERE user_id = $userId AND "
                                    . " a.role_id = b.id";
        $userRoleCollection         = Database::getAll($getUserRoleCollectionQuery);         
        
        return array(
            'user'  => $userObject,
            'roles' => $userRoleCollection
        );
    }
    
}