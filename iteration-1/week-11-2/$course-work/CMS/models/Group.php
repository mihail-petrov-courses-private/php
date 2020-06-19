<?php

namespace models;

class Group {
    
    public static function create($title, $priority) {
       
        $query = "INSERT INTO cms.cms_groups(title, priority) VALUES('{$title}', {$priority})";
        \db\Database::getInstance()->query($query);
        
        return \db\Database::getInstance()->lastInsertedId();
    }
    
    public static function update($id, $title) {
        
        $query = "UPDATE cms.cms_groups SET title = '{$title}' WHERE id = {$id}";
        \db\Database::getInstance()->query($query);
        
        return (\db\Database::getInstance()->affectedRows() == 1);    
    }
    
    public static function delete($id) {
        
        $query = "DELETE FROM cms.cms_groups WHERE id = {$id}";
        \db\Database::getInstance()->query("DELETE FROM cms.cms_groups WHERE id = {$id}");
        
        return (\db\Database::getInstance()->affectedRows() == 1);    
    }        
    
    public static function fetch($id = null) {
        
        $query = ($id)  ? "SELECT * FROM cms.cms_groups WHERE id = {$id}" 
                        : "SELECT * FROM cms.cms_groups";
        
        \db\Database::getInstance()->query($query);
        return \db\Database::getInstance()->fetchCollection();
    }
}