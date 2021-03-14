<?php
namespace src\client\controllers\front;

class HomeController {
    
    public function index() {
        load_view('front', 'home');
    }
}