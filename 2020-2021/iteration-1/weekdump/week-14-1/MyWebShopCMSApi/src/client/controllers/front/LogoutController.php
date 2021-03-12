<?php
namespace src\client\controllers\front;

class LogoutController {
    
    public function logout() {
        
        session_destroy();
        redirect('home');        
    }
}


