<?php

namespace models;

class OpinionModel {
     
    // public static function create($topickId, $opionionContent, $opionionAuthor) {
    public static function create($arguments) {
        
        $topickId           = $arguments['id'];
        $opionionContent    = $_POST['opinion_content'];
        $opionionAuthor     = $_POST['opinion_author'];
        $opionionMood       = $_POST['opinion_mood'];
        
        $query = "INSERT INTO public_board.opinions(topick_id, content, author, mood_id) "
                . "VALUES($topickId, '$opionionContent', '$opionionAuthor', $opionionMood)";
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