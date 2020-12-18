<?php

 $catObjectMainCollection   = select(DB_ITEMS);
 $catObjectCollection       = $catObjectMainCollection;
    
    function doesPrpertyExsist($propertyValue) {
        return !!$propertyValue;
    }
    
    function getCatProperty($propery) {
        
        if(doesPrpertyExsist($propery)) {
            return "<span> $propery</span>";
        }
        return "<span> марсианска технология </span>";
    }
    
    
    // *****
    if(isset($_GET['tokken']) && $_GET['tokken'] == 1) {
        
        $searchCategory         = $_GET['search_category'];
        $searchValue            = $_GET['search_category_value'];
        $searchBuySell          = $_GET['search_category_buy_sell'];
        $catObjectCollection    = filter($catObjectMainCollection, $searchCategory, $searchValue, $searchBuySell);
        
        
//        if(strlen($searchValue) != 0) {
//            
//            // 1. Create new array
//            $catObjectCollection = [];
//
//            // 2. Loop over original $catObjectMainCollection
//            for($i = 0; $i < count($catObjectMainCollection); $i++) {
//
//                $currentFilterableArray = $catObjectMainCollection[$i];
//
//                if($currentFilterableArray[$searchCategory] == $searchValue) {
//                    array_push($catObjectCollection, $currentFilterableArray);
//                }
//            }            
//        }
    }