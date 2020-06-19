<?php

namespace models;

class OpinionModel {
     
    public static function create($topickId, $opionionContent, $opionionAuthor) {
        
        // $opionionContent    = $_POST['opinion_content'];
        // $opionionAuthor     = $_POST['opinion_author'];
        
        $query = "INSERT INTO public_board.opinions(topick_id, content, author) VALUES($topickId, '$opionionContent', '$opionionAuthor')";
        \db\Database::getInstance()->query($query);
        
        return \db\Database::getInstance()->lastInsertedId();
    }
    
    public static function read() {
        
    }    
    
    public static function update() {
        
    }    
    
    public static function delete() {
        
    }   
}