<?php

class ProductModel {
    
    const PRODUCT_ID    = "product_id";
    const QUANTITY      = "quantity";
    const USER_ID       = "user_id";

    public static function getAllProducts() {
        return Database::select('tb_products')::fetch();
    }

    public static function isProductAvailable($dataCollection) {
            
        // check if product queantity exists
        $fetchQuery = Database::select('tb_products')::where(array(
            // 'id' => $this->productId
            'id' => $dataCollection[self::PRODUCT_ID]
        ))::fetchSingle();
        
        // return $fetchQuery['quantity'] >= $this->quantity;
        return $fetchQuery['quantity'] >= $dataCollection[self::QUANTITY];
    }
    
    public static  function markProductToCustomer($dataCollection) {
        
        $productUserCollection = Database::select('tb_user_product')::where(array(
            'user_id'     => $dataCollection[self::USER_ID],//User::getId(),
            'product_id'  => $dataCollection[self::PRODUCT_ID]//$this->productId
        ))::fetch();
        
        if(count($productUserCollection) > 0) {
            // return $this->updateUserProduct();
            return self::updateUserProduct(array(
                self::USER_ID       => $dataCollection[self::USER_ID],//User::getId(),
                self::PRODUCT_ID    => $dataCollection[self::PRODUCT_ID],
                self::QUANTITY      => $dataCollection[self::QUANTITY]
            ));
        }
        
        self::insertUserProduct(array(
            self::USER_ID       => $dataCollection[self::USER_ID],
            self::PRODUCT_ID    => $dataCollection[self::PRODUCT_ID],
            self::QUANTITY      => $dataCollection[self::QUANTITY]
        ));
        // $this->insertUserProduct();
    }
    
    public static function updateUserProduct($dataCollection) {
        
        $userProductEntity = Database::select('tb_user_product')::where(array(
            'user_id'     => $dataCollection[self::USER_ID],
            'product_id'  => $dataCollection[self::PRODUCT_ID]//$this->productId            
        )):: fetchSingle();
        
        $userProductQuantity    = $userProductEntity[self::QUANTITY];
        $newUserProductQuantity = ($userProductQuantity + $dataCollection[self::QUANTITY]/*$this->quantity*/);
        
        Database::update('tb_user_product', array(
            'quantity' => $newUserProductQuantity
        ))::where(array(
            'user_id'     => User::getId(),
            'product_id'  => $dataCollection[self::PRODUCT_ID]//$this->productId            
        ))::execute();
    }

    public static  function insertUserProduct($dataCollection) {
        
        // INSert new relation between user and product
        Database::insert('tb_user_product', array(
            'user_id'     => $dataCollection[self::USER_ID],
            'product_id'  => $dataCollection[self::PRODUCT_ID],//$this->productId,
            'quantity'    => $dataCollection[self::QUANTITY]//$this->quantity
        ));
    }
    
    public static  function updateProduct($dataCollection) {
        
        $productEntity = Database::select('tb_products')::where(array(
            'id'    => $dataCollection[self::PRODUCT_ID]//$this->productId
        ))::fetchSingle();
        
        $productQuantity    = $productEntity['quantity'];
        $newProductQuantity = $productQuantity - $dataCollection[self::QUANTITY];//$this->quantity;
        
        Database::update('tb_products', array(
            'quantity' => $newProductQuantity
        ))::where(array(
            'id'    => $dataCollection[self::PRODUCT_ID] //$this->productId
        ))::execute();
    }
}