<?php
$gameTitle = "Kasparov Tron";

function getTailColor($tileType) {
    
    if($tileType == '*') {
        return "<td><div class='black'></div></td>";
    }
    
    return "<td><div class='white'></div></td>";
}


function piece($type) {
    
}

function displayBoard() {
        
    $chessBoard = array(
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
   
    $tableBody = "";
    
    for($i = 0; $i < 10; $i++) {
        
        $tableBody .= "<tr>";
        
        for($j=0; $j < 10; $j++) {
            $tableBody .= getTailColor($chessBoard[$i][$j]);
        }
        
        $tableBody .= "</tr>";
    }
    
    return "<table>$tableBody</table>";
}