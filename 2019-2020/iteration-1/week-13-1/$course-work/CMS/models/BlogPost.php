<?php

namespace models;

class BlogPost {
 
    // create 
    public static function create($title, $previewContent, $content) {
        
        $query = "INSERT INTO cms.cms_posts(title, preview_contet, content) "
                . "VALUES('{$title}', '{$previewContent}', '{$content}')";
                
        \db\Database::getInstance()->query($query);
        return \db\Database::getInstance()->lastInsertedId();
    }
    
    // update
    public static function update() {
        
    }
    
    // remove / update 
    public static function delete() {
        
    }    
    
    // fetch 
    public static function fetch($id = null) {

        $query = "SELECT * FROM cms.cms_posts ";
        if($id) {
            $query = "$query WHERE id = {$id}";
        }
        
        \db\Database::getInstance()->query($query);
        return \db\Database::getInstance()->fetchCollection();
    }
}