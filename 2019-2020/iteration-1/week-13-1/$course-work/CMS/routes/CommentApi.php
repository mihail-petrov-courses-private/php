<?php

namespace routes;

class PostApi {
    
    public static function index($id = null) {
        
        $collection = \models\Comment::fetch($id);
        echo json_encode($collection);
    }
    
    public static function create() {
        
    }
    
    
}