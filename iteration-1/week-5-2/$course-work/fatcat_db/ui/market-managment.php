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

function display_item($collectionItem) {
        
 
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
}

function dispay_action_button($displayItem, $actionFlag = "view") {
    
//    $queryParameterString = "?name=" . $displayItem['name'] 
//                            . "&img=" . $displayItem['img'] 
//                            . "&age=" . $displayItem['age'] 
//                            . "&address=" . $displayItem['address'];
    
    $queryParameterString = "?id={$displayItem['id']}";
    
    if($actionFlag == 'buy') {
        return "<a href='details.php" . $queryParameterString . "'>BUY</a>";
    }
    
    if($actionFlag == 'sell') {
        return "<a href='details.php" . $queryParameterString . "'>SELL</a>";
    }
    
    return "<a href='details.php" . $queryParameterString . "'>VIEW</a>";
}
