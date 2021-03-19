<?php

function get_controll_collection() {

    if(array_key_exists('PATH_INFO', $_SERVER)) {
        
        $pathInfo           = $_SERVER['PATH_INFO'];
        $pathInfoCollection = explode('/', $pathInfo);
        array_shift($pathInfoCollection);
        
        if($pathInfoCollection[0] == "") {
            return [];
        }
        
        return $pathInfoCollection;
    }
    
    return [];
}

function get_controller() {
    
    $controllCollection = get_controll_collection();
    
    if(count($controllCollection) > 0) {
        return $controllCollection[0];
    }
   
    return 'home';
}

function get_action() {
    
    $controllCollection = get_controll_collection();
    
    if(count($controllCollection) > 1) {
        return $controllCollection[1];
    }
    
    return 'index';
}

$routerMapper = array(
  
    'home' => array(
        'include_path'      => './actions/util.php',
        'action_function'   => 'renderInitilContent'        
    ),
    
    'home/index' => array(
        'include_path'      => './actions/util.php',
        'action_function'   => 'renderInitilContent'        
    ),
    
    'home/back' => array(
        'include_path'      => './actions/util.php',
        'action_function'   => 'goBackHref'        
    ),    
    
    '404'       => array(
        'include_path'      => './actions/util.php',
        'action_function'   => 'pageNotFound'                
    )
);

function load_controller($routerMapper, $routerPath) {

    $router = $routerMapper[$routerPath];
    $filePath       = $router['include_path'];
    $xecuteFunction = $router['action_function']; 

    include "$filePath";
    $xecuteFunction();
}

$controller =  get_controller();
$action     = get_action();
$routerPath = "$controller/$action";

if(array_key_exists($routerPath, $routerMapper)) {
    load_controller($routerMapper, $routerPath);
}
else {
    load_controller($routerMapper, '404');
}