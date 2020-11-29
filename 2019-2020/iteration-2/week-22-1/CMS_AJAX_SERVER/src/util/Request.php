<?php

class Request {
    
    public static function jsonStreem() {
        
        $jsonObject     = file_get_contents("php://input");
        return json_decode($jsonObject);
    }
}