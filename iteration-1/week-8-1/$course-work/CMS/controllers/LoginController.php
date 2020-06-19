<?php

namespace controllers;

class LoginController {
    
    public function index() {
        
        if(isset($_POST) && isset($_POST['post_tokken'])) {
            
            $email      = $_POST['email'];
            $password   = $_POST['password'];
            
            // TODO : Optimize
            if(\user\User::isAvailable($email, $password)) { // 1. Count 
                
               $userObject = \user\User::login($email, $password); // 2. Count + Get
               \user\User::set($userObject);
               header('Location: admin.php');
            }
            
            \session\Session::setFlashMessage('error_message', 'Потребителя не е намерен в системата');
            
            
            // returnn proper message 
//            $_SESSION['error_message'] = array(
//                'message'           => 'Потребителя не е намерен в системата',
//                'is_visible'        => true,
//                'background_color'  => '#ff0000'
//            );
        }
    }
}