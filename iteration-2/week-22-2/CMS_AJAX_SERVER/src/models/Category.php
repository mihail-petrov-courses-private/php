<?php

class Category {
    
    public static function getAll() {
        return Database::select('tm_categories')::build();
    }
    
    public static function get($id) {
        
        return Database ::select('tm_categories')
                        ::where(array('id' => $id))
                        ::buildSingle();
    }
}