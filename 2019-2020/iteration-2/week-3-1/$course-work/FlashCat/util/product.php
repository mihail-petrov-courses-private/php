<?php

function hi() {
    echo "Hi";
}

function getInitCollection() {
    
    return array(
        array("id" => 1, "name" => "Maza 1", "description" => "Fat cat", "price" => '10.5 BGN')  ,
        array("id" => 2, "name" => "Pisana 2", "description" => "Slim cat", "price" => '12 USD') ,
        array("id" => 3, "name" => "Prusho 3", "description" => "Flufy cat", "price" => '5 EUR') ,
        array("id" => 4, "name" => "Obama", "description" => "White cat", "price" => '250 SEK')
    );
}
