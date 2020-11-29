<?php

class Piece {
 
    protected $color = 'W'; 
    protected $score = 100;
    public $signature = 'F';
    
    public function render() {
        return "<div class='{$this->color}'>{$this->signature}</div>";
    }
}