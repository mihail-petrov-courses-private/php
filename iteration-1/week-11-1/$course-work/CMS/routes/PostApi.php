<?php

namespace routes;

class PostApi {
    
    public function index() {
        
        $collection = \blogpost\BlogPost::fetch();        
        echo json_encode($collection);
    }
}