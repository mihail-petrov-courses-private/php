<?php

$catObjectMainCollection = [
    [
        "id"                    => 1,
        "name"                  => "Maza", 
        "fat_level"             => "много дебела", 
        "fur_color"             => "червена", 
        "age"                   => 4,
        "is_available_for_buy"  => false, 
        "is_available_for_sell" => true
    ],
    [
        "id"                    => 2,
        "name"                  => "Pisana 1", 
        "fat_level"             => "дебела", 
        "fur_color"             => "зелена", 
        "age"                   => 2,            
        "is_available_for_buy"  => false, 
        "is_available_for_sell" => true
    ],
    [
        "id"                    => 3,
        "name"                  => "Pisana 2", 
        "fat_level"             => "слаба", 
        "fur_color"             => "бяла", 
        "age"                   => 3,            
        "is_available_for_buy"  => true, 
        "is_available_for_sell" => false            
    ]
];


function get_element_by_id($catObjectMainCollection, $id) {
    
    foreach ($catObjectMainCollection as $element) {
        
        if($element['id'] == $id) {
            return $element;
        }
    }
    
    return null;
}