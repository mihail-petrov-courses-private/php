<?php

$username       = $_POST['username'];
$password       = $_POST['password'];
$repeatPassword = $_POST['repeat_password'];
$email          = $_POST['email'];

if(!Validator::hasMinLength($username, 5)) {
    return Message::set('sign_up_info_message', "Username length is below than 5 characters");
}

if(!Validator::hasMinLength($password, 5)) {
    return Message::set('sign_up_info_message', "Password length is below than 5 characters");
}

if(!Validator::hasMinLength($email, 5)) {
    return Message::set('sign_up_info_message', "E-mail length is below than 5 characters");
}    

if(!Validator::isRepeatPasswordValid($password, $repeatPassword)) {
    return Message::set('sign_up_info_message', "Original and repeat password does not match");
}

// TODO : process based on transaction 
Database::insert('tb_users', array(
    'username'  => Database::str($username),
    'password'  => Database::str(md5($password)),
    'mail'      => Database::str($email)
));

Database::insert('tm_users__user_role', array(
    'user_id'   => Database::getLastInsertedId(),
    'role_id'   => 1 // TODO : Think about something better
));