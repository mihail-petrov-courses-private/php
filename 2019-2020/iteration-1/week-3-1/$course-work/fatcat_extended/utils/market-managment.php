<?php

function display_item_collection($collection) {
    
    foreach ($collection as $itemElement) {
        display_item($itemElement);
    }
}

function display_item_collection_for_buy($collection) {
    
    foreach ($collection as $itemElement) {
        display_item_for_buy($itemElement);
    }
}

function display_item_collection_for_sell($collection) {
    
    foreach ($collection as $itemElement) {
        display_item_for_sell($itemElement);
    }
}

function display_item($collectionItem) {
                
    echo "<img class='cat-banner' src='" . $collectionItem['img'] . "'>";
    echo "<span>" . $collectionItem['name'] . "</span>";
    echo "<span>" . $collectionItem['age'] . "</span>";
    echo "<span>" . $collectionItem['address'] . "</span>";        
}

function display_item_for_sell($collectionItem) {
    
    display_item($collectionItem);
    echo "<button>Sell</button>";
}

function display_item_for_buy($collectionItem) {
    
    display_item($collectionItem);
    echo "<button>Buy</button>";    
}