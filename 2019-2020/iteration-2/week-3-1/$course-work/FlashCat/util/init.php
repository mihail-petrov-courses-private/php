<?php
session_start();

function isUserLogedIn() {
    // return isset($_SESSION['full_name']);
    return isset($_SESSION['ís_logged']);
}

function isUserNotLogedIn() {
    return !isUserLogedIn();
}

function redirectTo($page) {
    header("Location: $page");
}

function validateIsUserHasCredentials($userFullname, $userEmail) {
    
//    $hasFullname       = (isset($_GET["user_fullname"]) AND (strlen($_GET["user_fullname"]) > 0));
//    $hasEMail          =  isset($_GET["user_email"]);
//    $hasCredentials    =  $hasFullname AND $hasEMail;
    
    $hasFullname       = (isset($userFullname) AND (strlen($userFullname) > 0));
    $hasEMail          =  isset($userEmail);
    $hasCredentials    =  $hasFullname AND $hasEMail;    
    
    // return ($hasFullname AND $hasEMail);
    return $hasCredentials;
}

function signInUser($userFullname) {
    
    $_SESSION['full_name'] = $userFullname;
    $_SESSION['ís_logged'] = true;
}

function sessionMessage() {
     echo "Hi my name is " . $_SESSION['full_name'];
}


function debug($label, $collection) {
    
    echo '<hr>';
    echo "Debug : $label";
    echo '<pre>';
    var_dump($collection);
    echo '</pre>';
    echo '<hr>';
}

function getUrlFullPath($urlCollection) {
    
    $documentRoot           = $_SERVER['DOCUMENT_ROOT']; // C:/xampp/htdocs
    $documentUri            = $_SERVER['REQUEST_URI'];
    $documentUriCollection  = explode("/", $documentUri);
    $documentRootDirectory  = $documentUriCollection[1];
    
    $baseUrl                = $documentRoot . DIRECTORY_SEPARATOR .  
                              $documentRootDirectory;
    
    for($i = 0; $i < count($urlCollection); $i++) {
        $baseUrl = $baseUrl . DIRECTORY_SEPARATOR . $urlCollection[$i];
    }
    
    return $baseUrl;
}
