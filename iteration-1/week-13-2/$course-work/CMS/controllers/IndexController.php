<?php

namespace controllers;

class IndexController {
    
    private $blogPostCollection = array();
    
    public function index() {
        $this->blogPostCollection = \models\Post::fetch();
        
        if(isset($_GET) && isset($_GET['request'])  && $_GET['request'] == 'data') {
            echo "Hello world";
        }
    }
    
    public function getBlogPostCollection($param = null) {
        return $this->blogPostCollection;
    }
}