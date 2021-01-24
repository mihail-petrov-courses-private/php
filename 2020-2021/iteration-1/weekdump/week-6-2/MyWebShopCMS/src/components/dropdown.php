<?php

function dropdown($dropdownId, $categoryCollection) {
    
    // FOR LOOP
    echo "<select  name='$dropdownId'>";
    for($i = 0; $i < count($categoryCollection); $i++) {
        
        $id     = $categoryCollection[$i]['id'];
        $title  = $categoryCollection[$i]['title'];
        
        echo "<option value='$id'>$title</option>";    
    }
    echo "</select>";
}

function dropdownCategory() {
    
    $categoryCollection = Database::fetch("tb_categories");
    dropdown('product_category', $categoryCollection);
}