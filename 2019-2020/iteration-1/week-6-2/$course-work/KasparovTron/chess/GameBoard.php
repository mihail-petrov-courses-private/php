<?php

// Single responsibility principle 
class GameBoard {
   
    private $width;
    private $height;
    private $board;

//    private $board = array(
//        array('*', '-','*', '-','*', '-','*', '-','*', '-'),        // 0 
//        array((new Pawn("W")), '*', '-', '*', '-', '*', '-', '*', '-', '*'),    // 1
//        array('*', '-','*', '-','*', '-','*', '-','*', '-'),        // 2
//        array('-', '*', '-', '*', '-', '*', '-', '*', '-', '*'),    // 3
//        array('*', '-','*', '-','*', '-','*', '-','*', '-'),        // 4
//        array('-', '*', '-', '*', '-', '*', '-', '*', '-', '*'),    // 5
//        array('*', '-','*', '-','*', '-','*', '-','*', '-'),        // 6
//        array('-', '*', '-', '*', '-', '*', '-', '*', '-', '*'),    // 7
//        array('*', '-','*', '-','*', '-','*', '-','*', '-'),        // 8
//        array('-', '*', '-', '*', '-', '*', '-', '*', '-', '*'),    // 9
//    );    
    
    public function __construct($width, $height) {
        
        $this->setWidth($width);
        $this->setHeight($height);
        
        $this->board = array(
          array(new Rook("W"), new Knight("W"), new Bishop("W"), new King("W"), new Queen("W"),0,0,0,0,0),
          array(new Pawn("W"), new Pawn("W"), new Pawn("W"), new Pawn("W"), new Pawn("W"), 0,0,0,0,0),
          array(0,0,0,0,0,0,0,0,0,0),
          array(0,0,0,0,0,0,0,0,0,0),
          array(0,0,0,0,0,0,0,0,0,0),
          array(0,0,0,0,0,0,0,0,0,0),
          array(0,0,0,0,0,0,0,0,0,0),
          array(0,0,0,0,0,0,0,0,0,0),
          array(new Pawn("B"), new Pawn("B"), new Pawn("B"), new Pawn("B"), new Pawn("B"), 0,0,0,0,0),
          array(new Rook("B"), new Knight("B"), new Bishop("B"), new King("B"), new Queen("B"),0,0,0,0,0)
        );
    }
    
    public function setWidth($value) {

        $this->width = 10;
        if($value <= 10 AND $value >= 8) {
            $this->width = $value;
        }
    }
        
    public function getWidth() {
        return $this->width;
    }

    public function setHeight($value) {

        $this->height = 10;
        if($value <= 10 AND $value >= 8) {
            $this->height = $value;
        }
    }    

    public function getHeight() {
        return $this->height;
    }
    
    private function getTail($rowIndex, $colIndex, $tile) {
        
        $isRowEven  = ($rowIndex % 2 == 0);
        $isColEven  = ($colIndex % 2 == 0);
        $isRowOdd   = ($rowIndex % 2 != 0);
        $isColOdd   = ($colIndex % 2 != 0);
        
        $isBlack    = ($isRowEven && $isColEven) || 
                      ($isRowOdd  && $isColOdd);
        
        if($isBlack) {
            
            if($tile == 0) {
                return "<td><div class='black'></div></td>";
            }
            else {
                $signature = $tile->render();
                return "<td><div class='black'>$signature</div></td>";
            }
        }
        
        if($tile == 0) {
            return "<td><div class='white'></div></td>";
        }
        else {
            $signature = $tile->render();
            return "<td><div class='white'>$signature</div></td>";
        }
    }    
    
    public function display() {
        
        $tableBody = "";
        
        for($i = 0; $i < $this->width; $i++) {

            $tableBody .= "<tr>";

            for($j=0; $j < $this->height; $j++) {
                $tableBody .= $this->getTail($i, $j, $this->board[$i][$j]);
            }

            $tableBody .= "</tr>";
        }
        
        return "<table>$tableBody</table>"; 
    }
}