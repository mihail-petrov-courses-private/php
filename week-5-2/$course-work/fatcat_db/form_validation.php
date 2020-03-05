<?php

if(isset($_POST['welcome_form_tokken']) && $_POST['welcome_form_tokken'] == 1) {
    
    $username       = $_POST['user_name'];
    $isAvailable    = !empty($username);
    
    
    if($isAvailable) {
        header('Location: dashboard.php');
    }
    else {
        header('Location: index.php');
    }
}