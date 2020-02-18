<?php

function display_item_collection($collection) {
    
    foreach ($collection as $itemElement) {
        display_item($itemElement);
    }
}

function display_item_collection_filter($collection, $filterFlag) {
    
    foreach ($collection as $itemElement) {
        
        if($filterFlag == 'all') {
            display_item($itemElement);
            continue;
        }
        
        if(array_key_exists('_action', $itemElement)) {

            if($itemElement['_action'] == $filterFlag) {
                display_item($itemElement);
            }
        }
    }
}

//function display_item_collection_for_buy($collection) {
//    
//    foreach ($collection as $itemElement) {
//        display_item_for_buy($itemElement);
//    }
//}

//function display_item_collection_for_sell($collection) {
//    
//    foreach ($collection as $itemElement) {
//        display_item_for_sell($itemElement);
//    }
//}

function display_item($collectionItem) {
        
    // $actionFlag;
    // Thurnary operator 
    $actionFlag = (array_key_exists('_action', $collectionItem)) ? 
                                      $collectionItem['_action'] : 
                                      'view';    
    echo "<div>";
    echo "<img class='cat-banner' src='" . $collectionItem['img'] . "'>";
    echo "<span>" . $collectionItem['name'] . "</span>";
    echo "<span>" . $collectionItem['age'] . "</span>";
    echo "<span>" . $collectionItem['address'] . "</span>";        
    echo dispay_action_button($collectionItem, $actionFlag);
    echo "</div>";
    
    
      // Use functions on bout places
//    if(array_key_exists('_action', $collectionItem)) {
//        dispay_action_button($collectionItem['_action']);
//    }
//    else {
//        dispay_action_button();
//    }
    
    // Manipulate only the value of a single variable 
//    if(array_key_exists('_action', $collectionItem)) {
//        $actionFlag = $collectionItem['_action'];
//    }
//    else {
//        $actionFlag = 'view';
//    }
//    
//    dispay_action_button($actionFlag);
  
    
}

function dispay_action_button($displayItem, $actionFlag = "view") {
    
//    if($actionFlag == 'buy') {
//        echo "<button>BUY</button>";
//    }
//    else if($actionFlag == 'sell') {
//        echo "<button>SELL</button>";
//    }   
//    else {
//        echo "<button>VIEW</button>";
//    }
    
    $queryParameterString = "?name=" . $displayItem['name'] 
                            . "&img=" . $displayItem['img'] 
                            . "&age=" . $displayItem['age'] 
                            . "&address=" . $displayItem['address'];
    
    if($actionFlag == 'buy') {
        return "<a href='details.php" . $queryParameterString . "'>BUY</a>";
    }
    
    if($actionFlag == 'sell') {
        return "<a href='details.php" . $queryParameterString . "'>SELL</a>";
    }
    
    return "<a href='details.php" . $queryParameterString . "'>VIEW</a>";
}

//function display_item_for_sell($collectionItem) {
//    
//    display_item($collectionItem);
//    echo "<button>Sell</button>";
//}

//function display_item_for_buy($collectionItem) {
//    
//    display_item($collectionItem);
//    echo "<button>Buy</button>";    
//}