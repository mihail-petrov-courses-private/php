<?php

// include getUrlFullPath("util" . DIRECTORY_SEPARATOR. "product.php");
include getUrlFullPath(array("util", "product.php"));

//debug('look over $_SERVER',  $_SERVER);


//hi();


if( !isset($_SESSION['is_product_collection_already_init']) OR 
    $_SESSION['is_product_collection_already_init'] == false) {
    
    $_SESSION['product_collection'] = getInitCollection();

    $_SESSION['is_product_collection_already_init'] = true;
}


function getProductCollection() {    
    
    $referenceCollection = array();
    
    
    for($i = 0; $i < count($_SESSION['product_collection']); $i++) {
        
        if( (isset($_SESSION['product_collection']["ready_for_buy"]) AND 
            $_SESSION['product_collection']["ready_for_buy"] == false)) {
            array_push($referenceCollection, $_SESSION['product_collection']);
        }
    }
    
    return $referenceCollection;
}


function addNewProduct($productArrayReference) {

    // debug("Test Inside New Product", "HELLOW RODL");
    
    $newProductInstance = array(
        'name'          => $productArrayReference['product_name'],
        'price'         => $productArrayReference['product_price'],
        'description'   => $productArrayReference['product_description'],
    );
    
    array_push($_SESSION['product_collection'], $newProductInstance);
}


function setThisProductForPendingPurchase($id) {
    
    for($i = 0; $i < count($_SESSION['product_collection']); $i++) {
        $currentProductElement = $_SESSION['product_collection'];
        if($currentProductElement['id'] == $id) {
            debug("WTF", $_SESSION['product_collection']);
            
            
            $_SESSION['product_collection'][$i]['ready_for_buy'] = true;
            return;
        }
    }
}