<?php
namespace src\client\controllers\front;
use src\client\models\ProductModel  as ProductModel;
use src\client\models\UserModel           as User;

class TellerController {
    
    private $modelDataCollection = array();
    
    public function __construct() {

        $this->modelDataCollection = array(
            
            ProductModel::PRODUCT_ID    => ((array_key_exists('id', $_GET))       ? $_GET['id']         : null),
            ProductModel::QUANTITY      => ((array_key_exists('quantity', $_GET)) ? $_GET['quantity']   : 1),
            ProductModel::USER_ID       => User::getId()
        );
    }

    public function index() {
        
        load_view('front', 'teller', [
            'productCollection' => ProductModel::getAllProducts()
        ]);
    }
    
    public function markProductForBuy() {

        if(ProductModel::isProductAvailable($this->modelDataCollection)) {
            
            ProductModel::markProductToCustomer($this->modelDataCollection);
            ProductModel::updateProduct($this->modelDataCollection);
            redirect('teller');
        }
    }
}