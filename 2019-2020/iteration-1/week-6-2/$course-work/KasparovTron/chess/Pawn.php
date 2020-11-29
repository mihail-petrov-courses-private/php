<?php

class Pawn extends Piece {
    
    public function __construct($color) {
        
        $this->color        = $color;
        $this->score        = 1;
        $this->signature    = "P";
    }
}