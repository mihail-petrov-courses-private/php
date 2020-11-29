<?php

class King {
    
    private $color; 
    private $score;
    
    public function __construct($color) {
        
        $this->color = $color;
        $this->score = 7;
    }
    
    public function render() {
        return "<div class='{$this->color}'>K</div>";
    }
}