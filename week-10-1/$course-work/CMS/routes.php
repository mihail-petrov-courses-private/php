<?php
include './external_autoload.php';

if(isset($_GET) && isset($_GET['endpoint'])) {
 
    $endpointMap = array(
        'posts'     => (new \routes\PostApi()),
        'groups'    => (new \routes\GroupApi())
    );
    
    $endpointMap[$_GET['endpoint']]->index(); 

    // \routes\PostApi()
    
    //var_dump($_GET['endpoint']);
    
    
    //$endpointMap[$_GET['endpoint']];
    
    
    /*
    if($_GET['endpoint'] == 'posts') {
        (new \routes\PostApi())->index();
    }
    
    if($_GET['endpoint'] == 'groups') {
        (new \routes\GroupApi())->index();
    }
     * */
}