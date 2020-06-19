<?php

class Queen {
    
    private $color; 
    private $score;
    
    public function __construct($color) {
        
        $this->color = $color;
        $this->score = 10;
    }
    
    public function render() {
        return "<div class='{$this->color}'>Q</div>";
    }
}