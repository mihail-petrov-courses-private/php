<?php
include './_external_autoload.php';

if(isset($_GET) && isset($_GET['endpoint'])) {
 
    $requestMethod = isset($_GET['method']) ? 
                     $_GET['method']        : 
                     'index';
    
    $requestId      = isset($_GET['id']) ? $_GET['id'] : null;
    
    
    $endpointMap = array(
        'posts'     => (new \routes\PostApi()),
        'groups'    => (new \routes\GroupApi()),
        'comment'   => (new \routes\CommentApi()),
        'auth'      => (new \routes\AuthApi())
    );
    
    // Refactor 
    if(is_null($requestId)) {
        $endpointMap[$_GET['endpoint']]->{$requestMethod}(); 
    }
    else {
        $endpointMap[$_GET['endpoint']]->{$requestMethod}($requestId); 
    }
    
}