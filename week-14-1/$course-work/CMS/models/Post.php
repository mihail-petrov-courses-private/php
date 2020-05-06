<?php

namespace models;

class Post {
 
    // create 
    // public static function create($title, $previewContent, $content, $categoryId = null) {
    public static function create($argumentCollection) {    
        
        $title          = $argumentCollection['title'];
        $previewContent = $argumentCollection['preview_contet'];
        $content        = $argumentCollection['content'];
        $groupId        = $argumentCollection['group'];
        
        $query = "INSERT INTO cms.cms_posts(title, preview_contet, content) "
                . "VALUES('{$title}', '{$previewContent}', '{$content}')";
               
        \db\Database::getInstance()->query($query);
        $lastInsertedId = \db\Database::getInstance()->lastInsertedId();
        
        
        $query = "INSERT INTO cms.cms_group_post(post_id, group_id) "
                . "VALUES('{$lastInsertedId}', '{$groupId}')";
                
        \db\Database::getInstance()->query($query);        
        
        return $lastInsertedId;
    }
    
    // update
    public static function update() {
        
    }
    
    // remove / update 
    public static function delete($id) {
        
        $query = "DELETE FROM cms.cms_posts WHERE id = {$id}";
        \db\Database::getInstance()->query($query);
        
        return (\db\Database::getInstance()->affectedRows() == 1);
    }    
    
    // fetch 
    public static function fetch($id = null) {

        if(is_null($id)) {
            $query = "SELECT * FROM cms.cms_posts ";
        }
        else {
            $query = "SELECT * FROM cms.cms_posts WHERE id = {$id}";
        }
        
        \db\Database::getInstance()->query($query);
        return \db\Database::getInstance()->fetchCollection();
    }
    
    public static function search($paramCollection) {
        
        $isSearchable =  $paramCollection['q'] && 
                         $paramCollection['searchBy'];
        
        
        if($isSearchable) {
            
            $keyword    = $paramCollection['q'];
            $column     = $paramCollection['searchBy'];
            $query      = "SELECT * FROM cms.cms_posts WHERE $column LIKE '%$keyword%'";
            
            \db\Database::getInstance()->query($query);
            return \db\Database::getInstance()->fetchCollection();            
        }
    }

        public static function fetchPostByGroup($groupId) {
        
        $query = "SELECT a.* FROM   
                                cms.cms_posts      a,
				cms.cms_groups     b,
                                cms.cms_group_post c
                
                WHERE a.id = c.post_id AND
                      b.id = c.group_id
                      AND b.id = $groupId";
        
        \db\Database::getInstance()->query($query);
        return \db\Database::getInstance()->fetchCollection();                
    }
    
}