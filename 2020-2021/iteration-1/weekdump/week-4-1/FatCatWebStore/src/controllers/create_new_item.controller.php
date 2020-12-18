<?php

if(isset($_POST['tokken']) && $_POST['tokken'] == '1') {
    
    /*
    <select name="create_new_item_type">
        <option value="for_buy">За покупка</option>
        <option value="for_sell">За продажба</option>
    </select>

    <label>Име на котка</label>
    <input type="text" name="create_new_item_name">
    <label>Възраст</label>
    <input type="number" name="create_new_item_age">                    
    
    <label>Дебелина</label>
    <input type="number" name="create_new_item_fat_index">                             
     */
    
    $type       = $_POST['create_new_item_type'];
    $name       = $_POST['create_new_item_name'];
    $age        = $_POST['create_new_item_age'];
    $fatLevel   = $_POST['create_new_item_fat_level'];
    $furColor   = $_POST['create_new_item_fur_collor'];
    
    $createNewItemElement = [
        // 'created_by_user_id'    => // SESSION data
        'name'                  => $name,
        'age'                   => $age,
        'fat_level'             => $fatLevel,
        'fur_color'             => $furColor,
        'age'                   => $age,
        'is_available_for_buy'  => ($type == 'for_buy'), 
        'is_available_for_sell' => ($type == 'for_sell')
    ];
    
    insert(DB_ITEMS, [
        $createNewItemElement
    ]);
    
   
    redirect(PAGE_STORE);
}
