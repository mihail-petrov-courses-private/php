<?php

if(User::isAuthenticated())        return redirect('index');

if(!isset($_POST['tokken']) && 
          $_POST['tokken'] != 1)   return;

$username = $_POST['username'];
$password = md5($_POST['password']);

$userData = Database::fetchQuery("SELECT * FROM tb_users where username = '$username' AND password = '$password'");

if(count($userData) == 1) {
    
    // QUERY builder for select statments
    $userId = $userData[0]['id'];
    $query = "  SELECT b.title 
                FROM tm_users__user_role a, 
                         tm_role b
                WHERE a.user_id = $userId AND 
                          a.role_id = b.id";
    
    $userRoleCollection = Database::fetchQuery($query);
    
    var_dump($userRoleCollection);
    
    
    User::auth($userData[0]);
    // return redirect('index');
}

Message::set('sign_in_info_message', 'No user found');