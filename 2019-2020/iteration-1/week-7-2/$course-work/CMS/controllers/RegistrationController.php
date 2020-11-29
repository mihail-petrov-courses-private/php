<?php

class RegistrationController {
    
    
    public function index() {
                
        if(isset($_POST) && isset($_POST['post_tokken'])) {
            
            $username   = $_POST['username'];
            $email      = $_POST['email'];

            // NB : store the password in secure way ???
            $password   = $_POST['password'];            
            
            if(User::registration($username, $email, $password)) {
                echo "Success registration";
            }
        }
    }
}