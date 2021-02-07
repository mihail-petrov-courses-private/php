<?php

class TellerController {
    
    private $action;
    private $productId;
    private $quantity;
    
    private $modelDataCollection = array();
    
    public function __construct() {
        
        $this->action     = (array_key_exists('action', $_GET))   ? $_GET['action']     : null;
        $this->productId  = (array_key_exists('id', $_GET))       ? $_GET['id']         : null;
        $this->quantity   = (array_key_exists('quantity', $_GET)) ? $_GET['quantity']   : 1;
        
        $this->modelDataCollection = array(
            ProductModel::PRODUCT_ID    => ((array_key_exists('id', $_GET))       ? $_GET['id']         : null),
            ProductModel::QUANTITY      => ((array_key_exists('quantity', $_GET)) ? $_GET['quantity']   : 1),
            ProductModel::USER_ID       => User::getId()
        );
    }

    public function index() {
        // return Database::fetch("tb_products");
        return ProductModel::getAllProducts();
    }
    
    public function markProductForBuy() {
        
        if(!$this->isStateMark()) return;
        
        //$isProductAvailable = $this->isProductAvailable();
        $isProductAvailable = ProductModel::isProductAvailable($this->modelDataCollection);
        
        if($isProductAvailable) {
            
            // $this->markProductToCustomer();
            ProductModel::markProductToCustomer($this->modelDataCollection);
            
            //$this->updateProduct();
            ProductModel::updateProduct($this->modelDataCollection);
            //
            // TODO : refrech controller - data
            redirect('teller');
        }
    }
    
    private function isStateMark() {
        return $this->action == 'mark';
    }
}