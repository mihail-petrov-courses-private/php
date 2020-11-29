<?php

function getProductCollection() {
    
    $_SESSION['product_collection'] = array(
        array("name" => "Maza", "description" => "Fat cat", "price" => '10.5 BGN')  ,
        array("name" => "Pisana", "description" => "Slim cat", "price" => '12 USD') ,
        array("name" => "Prusho", "description" => "Flufy cat", "price" => '5 EUR') ,
        array("name" => "Obama", "description" => "White cat", "price" => '250 SEK'),    
    );
    
    return $_SESSION['product_collection'];
}


//function addNewProduct($productName, $productPrice, $productDescription) {
//    
//    $newProductInstance = array(
//        'name'          => $productName,
//        'price'         => $productPrice,
//        'description'   => $productDescription
//    );
//    
//    array_push($_SESSION['product_collection'], $newProductInstance);
//    
//    echo '<pre>';
//    var_dump($_SESSION);
//    echo '</pre>';
//}

function addNewProduct($productArrayReference) {
    
    $newProductInstance = array(
        'name'          => $productArrayReference['product_name'],
        'price'         => $productArrayReference['product_price'],
        'description'   => $productArrayReference['product_description'],
    );
    
    array_push($_SESSION['product_collection'], $newProductInstance);
    
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
}