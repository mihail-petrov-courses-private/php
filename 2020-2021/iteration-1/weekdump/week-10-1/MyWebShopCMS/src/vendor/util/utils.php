<?php 
session_start();

function basecontext($path) {
    
    $projectName = explode('/', $_SERVER['REQUEST_URI'])[1];
    return $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/' . $projectName . '/' . $path;
}

function url($path) {
    
    $serverName     = $_SERVER['SERVER_NAME'];
    $projectName    = explode('/', $_SERVER['REQUEST_URI'])[1];
    
    return "/$projectName/$path";
}

function load_view($context, $viewId, $externalVariables) {
    
    
    extract($externalVariables);
    $viewPath = "view/$context/$viewId.php";
    include basecontext($viewPath);
}


function load_controller($controller) {
    include basecontext("src/controllers/front/$controller.php");
}


function get_front_controller($controller) {
    return basecontext("src/client/controllers/front/$controller.php");
}

function get_admin_controller($controller) {
    return basecontext("src/client/controllers/admin/$controller.php");
}

function get_system_controller($controller) {
    return basecontext("src/client/controllers/system/$controller.php");
}

function css($path) {
    echo url("css/$path");
}

function navigate($path) {
    echo url("index.php/$path");
}

function buildQueryString($queryParameterCollection = []) {
    
    if(count($queryParameterCollection) == 0) {
        return "";
    }
    
    $queryString = array();
    foreach ($queryParameterCollection as $key => $value) {
        array_push($queryString, "$key=$value");
    }

    return "?" . implode('&', $queryString);
}

function a($href, $title, $queryParameterCollection = []) {
    
    $queryString = buildQueryString($queryParameterCollection);
    $url = url("index.php/$href$queryString");
    echo "<a href='". $url ."'>$title</a>";        
}

function redirect($path) {
    
    $page = url("index.php/$path");
    header("Location: $page");
}
