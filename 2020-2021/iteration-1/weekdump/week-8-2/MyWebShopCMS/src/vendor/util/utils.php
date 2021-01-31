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


function a($href, $title) {
    
    $url = url("index.php/$href");
    echo "<a href='". $url ."'>$title</a>";
}

function redirect($path) {
    
    $page = url("index.php/$path");
    header("Location: $page");
}
