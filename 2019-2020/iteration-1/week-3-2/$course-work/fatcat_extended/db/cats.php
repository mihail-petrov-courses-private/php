<?php

function get_cat_collection() {
    
    $catArtefactCollection = array();
    $fileHandler = fopen('cat_db.txt', 'r');
    
    while($line = fgets($fileHandler)) {
        $element = json_decode($line, true);
        array_push($catArtefactCollection, $element);
    }
    
    
    return $catArtefactCollection;
}



