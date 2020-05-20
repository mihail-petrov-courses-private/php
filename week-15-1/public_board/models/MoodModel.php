<?php

namespace models;

class MoodModel {
     
    public static function create($title) {
        
        $query = "INSERT INTO public_board.user_moods(title) "
                . "VALUES('$title')";
        \db\Database::getInstance()->query($query);
        
        return \db\Database::getInstance()->lastInsertedId();
    }
    
    public static function read() {
        
        $query = "SELECT * FROM public_board.user_moods";
        \db\Database::getInstance()->query($query);
        
        return \db\Database::getInstance()->fetchCollection();
    }    
    
    public static function update() {
        
    }    
    
    public static function delete() {
        
    }   
}