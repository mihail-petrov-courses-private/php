<?php

class Response {

    /**
     * 
     * @param type $jsonCollection
     * @param type $message
     */
    public static function notFound($responseInputCollection) {
        Response::send($responseInputCollection, '404');
    }
    
    /**
     * 
     * @param type $jsonCollection
     * @param type $message
     */
    public static function ok($responseInputCollection) {
        Response::send($responseInputCollection, '200');
    }    
    
    /**
     * 
     * @param type $responseInputCollection
     * @param type $statusCode
     */
    private static function send($responseInputCollection, $statusCode) {
        
        $responseObject = array(
            'status'    => $statusCode
        );
        
        if(isset($responseInputCollection['message'])) {
            $responseObject['message'] = $responseInputCollection['message'];
        }        
        
        if(isset($responseInputCollection['data'])) {
            $responseObject['data'] = $responseInputCollection['data'];
        }

        echo json_encode($responseObject);
    }
}