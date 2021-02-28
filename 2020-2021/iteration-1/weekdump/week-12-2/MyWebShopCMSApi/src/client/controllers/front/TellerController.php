<?php
namespace src\client\controllers\front;
use src\client\models\ProductModel  as ProductModel;
use src\client\models\UserModel     as User;

class TellerController {
    
    public function index() {
        echo json_encode(ProductModel::getAllProducts());
    }
    
    public function markProductForBuy() {
            
        $modelDataCollection = array(
            
            ProductModel::PRODUCT_ID    => $_POST['id'],
            ProductModel::QUANTITY      => ((array_key_exists('quantity', $_POST)) ? $_POST['quantity']   : 1),
            ProductModel::USER_ID       => User::getId()
        );
         
        if(ProductModel::isProductAvailable($modelDataCollection)) {
            
            ProductModel::markProductToCustomer($modelDataCollection);
            ProductModel::updateProduct($modelDataCollection);
        }
    }
}