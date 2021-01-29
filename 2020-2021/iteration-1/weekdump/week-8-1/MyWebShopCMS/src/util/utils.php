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

function css($path) {
    echo url("css/$path");
}

function redirect($page) {
    header("Location: $page.php");
}
