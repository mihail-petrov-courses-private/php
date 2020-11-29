<?php
include './external_autoload.php';

if(isset($_GET) && isset($_GET['endpoint'])) {
 
    $requestMethod = isset($_GET['method']) ? 
                     $_GET['method']        : 
                     'index';
    
    $endpointMap = array(
        'posts'     => (new \routes\PostApi()),
        'groups'    => (new \routes\GroupApi())
    );
    
    // Refactor 
    $endpointMap[$_GET['endpoint']]->{$requestMethod}(); 
}