<?php

// >  Piece 
// >> Pawn
// >> Rook
// >> Knight 
// >> KIng 
// >> Queen
// >> Bishop 

// > GameBoard
// >> Tile

class Piece {
    
}

class Tile {
    
}

class GameBoard {
    
    // public $width   = 10;
    private $width;
    private $height;
    
    public function __construct($width, $height) {
        
        $this->setWidth($width);
        $this->setHeight($height);
    }
    
    public function setWidth($value) {

        $this->width = 10;
        if($value <= 10 AND $value >= 8) {
            $this->width = $value;
        }
        
        // $this->width = ($value <= 10 AND $value >= 8) ? $value : 10;
    }
        
    public function getWidth() {
        return $this->width;
    }

    public function setHeight($value) {

        $this->height = 10;
        if($value <= 10 AND $value >= 8) {
            $this->height = $value;
        }
        
        // $this->width = ($value <= 10 AND $value >= 8) ? $value : 10;
    }    

    public function getHeight() {
        return $this->height;
    }
    
    private $board = array(
        array('*', '-','*', '-','*', '-','*', '-','*', '-'),
        array('-', '*', '-', '*', '-', '*', '-', '*', '-', '*'),
        array('*', '-','*', '-','*', '-','*', '-','*', '-'),
        array('-', '*', '-', '*', '-', '*', '-', '*', '-', '*'),
        array('*', '-','*', '-','*', '-','*', '-','*', '-'),
        array('-', '*', '-', '*', '-', '*', '-', '*', '-', '*'),
        array('*', '-','*', '-','*', '-','*', '-','*', '-'),
        array('-', '*', '-', '*', '-', '*', '-', '*', '-', '*'),
        array('*', '-','*', '-','*', '-','*', '-','*', '-'),
        array('-', '*', '-', '*', '-', '*', '-', '*', '-', '*'),
    );
    
    private function getTailColor($tileType) {
            
        if($tileType == '*') {
            return "<td><div class='black'></div></td>";
        }

        return "<td><div class='white'></div></td>";
    }    
    
    public function display() {
        
//        var_dump($this->width);
        
        $tableBody = "";
        
        for($i = 0; $i < $this->width; $i++) {

            $tableBody .= "<tr>";

            for($j=0; $j < $this->height; $j++) {
                $tableBody .= $this->getTailColor($this->board[$i][$j]);
            }

            $tableBody .= "</tr>";
            
            return "<table>$tableBody</table>"; 
        }
    }
}