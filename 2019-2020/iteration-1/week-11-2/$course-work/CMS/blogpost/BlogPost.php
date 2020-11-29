<?php

namespace blogpost;

class BlogPost {
 
    // create 
    public static function create($title, $previewContent, $content) {
        
        $query = "INSERT INTO cms.cms_posts(title, preview_contet, content) "
                . "VALUES('{$title}', '{$previewContent}', '{$content}')";
                
        \db\Database::getInstance()->query($query);
        return \db\Database::getInstance()->lastInsertedId();
    }
    
    // update
    
    // remove / update 
    
    // fetch 
    public static function fetch($id = null) {

//        if(is_null($id)) {
//            
//            \db\Database::getInstance()->query("SELECT * FROM cms.cms_posts");
//            return \db\Database::getInstance()->fetch();
//        }
//        
//        \db\Database::getInstance()->query("SELECT * FROM cms.cms_posts WHERE id = {$id}");
//        return \db\Database::getInstance()->fetch();        
        
        $query = "SELECT * FROM cms.cms_posts ";
        if($id) {
            $query = "$query WHERE id = {$id}";
        }
        
        \db\Database::getInstance()->query($query);
        return \db\Database::getInstance()->fetchCollection();
    }
}