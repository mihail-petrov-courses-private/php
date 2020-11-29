<?php

class Request {
    
    public static function jsonStreem() {
        
        $jsonObject     = file_get_contents("php://input");
        return json_decode($jsonObject);
    }
    
    public static function authTokken() {
        return isset(apache_request_headers()['dev-tokken']) ? apache_request_headers()['dev-tokken'] : null;
    }
}