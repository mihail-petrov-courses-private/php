<?php

include '../../validation/Validator.php';

$message = "";

if(isset($_POST['tokken']) && $_POST['tokken'] == 1) {
    
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $repeatPassword = $_POST['repeat_password'];
    $email          = $_POST['email'];
    
    if(!Validator::hasMinLength($username, 5)) {
        $message = "Username length is below than 5 characters";
        return;
    }
    
    if(!Validator::hasMinLength($password, 5)) {
        $message = "Password length is below than 5 characters";
        return;
    }
    
    if(!Validator::hasMinLength($email, 5)) {
        $message = "E-mail length is below than 5 characters";
        return;
    }    
    
    if(!Validator::isRepeatPasswordValid($password, $repeatPassword)) {
        $message = "Original and repeat password does not match";
        return;
    }
    
    Database::insert('tb_users', array(
        'username'  => Database::str($username),
        'password'  => Database::str($password),
        'mail'      => Database::str($email)
    ));
}