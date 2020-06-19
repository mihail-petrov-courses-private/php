<?php

class Endpoint {
    
        public function index() {
            
        if($_GET['request'] && $_GET['request'] == 'data') {
            echo "Hello world";
        }
    }
}


(new Endpoint())->index();