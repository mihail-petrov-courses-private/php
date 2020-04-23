<?php

namespace models;

class Comment {
    
    public static function create($paramCollction) {
        
        $postId  = $paramCollction['postId'];
        $content = $paramCollction['content'];
        $author = $paramCollction['author'];
        
        $query = "INSERT INTO cms.cms_comments(post_id, content, author)"
                . "VALUES({$postId}, {$content}, {$author})";
        
        \db\Database::getInstance()->query($query);
        return \db\Database::getInstance()->lastInsertedId();
    }
    
    public static function fetch($id = null) {
        
        $query = "SELECT * FROM cms.cms_comments"; 
        
        if($id) {
            $query = "SELECT * FROM cms.cms_comments WHERE id = {$id}";     
        }
        
        \db\Database::getInstance()->query($query);
        \db\Database::getInstance()->fetchCollection();
    }    

    public static function remove($param) {
        // ONLY FOR ADMIN
    }
    
    public static function update($param) {
        // ONLY FOR ADMIN        
    }   
    
    
    public static function fetchCommentsByBlogPostId($id) {
        
        $query = "SELECT * FROm cms.cms_comments WHERE post_id = {$id}";
        \db\Database::getInstance()->query($query);
        \db\Database::getInstance()->fetchCollection();
    }
}