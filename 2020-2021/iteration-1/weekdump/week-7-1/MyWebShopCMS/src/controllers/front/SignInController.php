<?php

$message = "";

if(isset($_POST['tokken']) && $_POST['tokken'] == 1) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    $userData = Database::fetchQuery("SELECT * FROM tb_users where username = '$username' AND password = '$password'");
    
    if(count($userData) == 1) {
        echo "You are loged in";
    }
    else {
        $message = "No user found";
    }
}