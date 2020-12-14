<?php

if(isset($_POST['tokken']) == 1) {
    
    $deliveryAddress = $_POST['address'];
    $itemId          = $_GET['id'];
    
    $itemObject      = get_element_by_id($catObjectMainCollection, $itemId);
    update_cart($itemObject);
}