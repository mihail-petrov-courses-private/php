<?php

$message = null;


if(isset($_POST['product_tokken']) && $_POST['product_tokken'] == 1) {
    
    $title              = $_POST['product_title'];
    $price              = $_POST['product_price'];
    $quantity           = $_POST['product_quantity'];
    $productCategory    = $_POST['product_category'];
    
    Database::insert('tb_products', [   
        'title'     => Database::str($title),
        'price'     => $price,
        'quantity'  => $quantity
    ]);
    
    Database::insert('tm_product__category', [
        'product_id'    => Database::getLastInsertedId(),
        'category_id'   => $productCategory
    ]);
    
    Database::update('tb_products', [
        'title' => Database::str('New product')
    ])::where(['id' => 10])::execute();
    
    $message = 'Product is inserted succesfuly';
}