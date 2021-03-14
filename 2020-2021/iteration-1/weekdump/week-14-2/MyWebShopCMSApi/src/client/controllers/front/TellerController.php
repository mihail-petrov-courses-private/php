<?php
namespace src\client\controllers\front;
use src\client\models\ProductModel  as ProductModel;
use src\client\models\UserModel     as User;
use \src\vendor\database\Database   as Database;
use src\vendor\http\Response        as Response;

class TellerController {
    
    public function index() {
        
        // Guard  for access tokken
        if(array_key_exists('Access-Tokken', getallheaders())) {
            $tokken = getallheaders()['Access-Tokken'];
            $isValid = User::isAccessTokkenValid($tokken);
            
            if(!$isValid) {
                return Response::forbiden([
                    'message'       => 'You cannot access this url',
                    'messageCode'   => 'UNATORIZED_ACCESS'
                ]);
            }
        }
        
        //
        $filterCollection = filter(array(
            'title' => filter_request('productName')
        ));
        
        $limitCollection = limit_calculator(array(
            'limit' => filter_request('limit', true),
            'page'  => filter_request('page', true)
        ));
        
        echo json_encode(ProductModel::getAllProducts($filterCollection, $limitCollection));
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