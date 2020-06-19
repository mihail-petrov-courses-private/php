<?php

namespace routes;

class AuthApi {
    
    public function login() {

        $email      = $_POST['email'];
        $password   = $_POST['password'];

        if(\user\User::isAvailable($email, $password)) { // 1. Count 

           $userObject = \user\User::login($email, $password); // 2. Count + Get
           \user\User::set($userObject);
            
           echo json_encode($userObject);
           return;
        }
        
        echo "Authnentication error";
    }
    
    public function registration() {
        // crate new user and return success
    }    
    
    public function auth() {
        
    }
}