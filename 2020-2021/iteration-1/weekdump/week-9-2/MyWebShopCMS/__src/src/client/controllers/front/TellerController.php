<?php

class TellerController {
    
    private $action;
    private $productId;
    private $quantity;
    
    public function __construct() {
        
        $this->action     = (array_key_exists('action', $_GET))   ? $_GET['action']     : null;
        $this->productId  = (array_key_exists('id', $_GET))       ? $_GET['id']         : null;
        $this->quantity   = (array_key_exists('quantity', $_GET)) ? $_GET['quantity']   : 1;
    }

    public function index() {
        return Database::fetch("tb_products");
    }
    
    public function markProductForBuy() {
        
        if(!$this->isStateMark()) return;
        
        
        $isProductAvailable = $this->isProductAvailable();
        if(isProductAvailable) {
            $this->markProductToCustomer();
        }
    }
    
    private function isProductAvailable() {
            
        // check if product queantity exists
        $fetchQuery = Database::fetch('tb_products')::where(array(
            'id' => $this->productId
        ))::execute();        
        
        return $fetchQuery['quantity'] >= $this->quantity;
    }
    
    private function markProductToCustomer($param) {
        
        // INSert new relation between user and product
        Database::insert('tb_user_product', array(
            user_id     => User::getId(),
            product_id  => $productId,
            quantity    => $quantity
        ));                
    }
    
    
    private function isStateMark() {
        return $this->action == 'mark';
    }
}