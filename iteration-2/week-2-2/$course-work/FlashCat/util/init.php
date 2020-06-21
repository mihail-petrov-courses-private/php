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

function nestedFunction() {
    echo 'This is nested function';
return;}

function noReturn() {
    nestedFunction();
return;}


function returnFunction() {
   
    return 10;
    nestedFunction();
return;}


$returnVariable     = returnFunction();
$noReturnVariable   = nestedFunction(); // ? NULL

echo "<br>";
var_dump($returnVariable);
echo "<br>";
var_dump($noReturnVariable);





