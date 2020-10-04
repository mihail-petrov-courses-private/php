<?php

function getApplicationCategoryCollection() {
    return Database::getAll("SELECT * FROM tm_categories");
}

function getAdminCategory() {
    
    if(isset($_GET['category_id'])) {
        
        $post_category_id = $_GET['category_id'];
        $query = Database::query("SELECT title FROm tm_categories WHERE id = $post_category_id");
        
        return mysqli_fetch_assoc($query)['title'];
    }    
}

function getAdminActionTokken() {
    
    if(isset($_GET['action'])) return $_GET['action'];
    return 'create';
}

function getCategoryTokken() {
    
    if(isset($_GET['category_id'])) return $_GET['category_id'];
    
    return 'NO';
}

if(isset($_GET['admin_action_tokken']) AND $_GET['admin_action_tokken'] == 'create') {
    
    Database::insert('category_title', array(
        'title' => $_GET['category_title']
    ));
}

if(isset($_GET['admin_action_tokken']) AND  $_GET['admin_action_tokken'] == 'edit') {
    
    Database::update('tm_categories', array('title' => $_GET['category_title']), 
                                      array('id'    => $_GET['admin_category_tokken']));
}

if(isset($_GET['action']) AND $_GET['action'] == 'delete') {
    Database::delete('tm_categories', array('id' => $_GET['category_id']));
}