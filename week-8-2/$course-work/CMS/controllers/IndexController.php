<?php

namespace controllers;

class IndexController {
    
    private $blogPostCollection = array();
    
    public function index() {
        $this->blogPostCollection = \blogpost\BlogPost::fetch();
    }
    
    public function getBlogPostCollection($param = null) {
        return $this->blogPostCollection;
    }
}