<?php

namespace src\vendor\http;

class Response {
    
    public static function success($input = array()) {
        self::buildMessage(200, $input);
    }
    
    public static function fail($input = array()) {
        self::buildMessage(400, $input);
    }
    
    public static function forbiden($input = array()) {
        self::buildMessage(403, $input);
    }    
    
    private static function buildMessage($status, $buildCollection = array()) {
        
        $responseCollection                 = [];
        $responseCollection['message']      = $buildCollection['message'];
        $responseCollection['messageCode']  = $buildCollection['messageCode'];
        $responseCollection['status']       = $status;
        http_response_code($status);
        
        if(isset($buildCollection['data'])) {
            $responseCollection['data'] = $buildCollection['data'];
        }        
        
        echo json_encode($responseCollection);
    }
    
}