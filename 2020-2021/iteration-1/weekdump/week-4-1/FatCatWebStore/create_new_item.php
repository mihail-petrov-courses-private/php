<?php include './src/templates/header.php'; ?>
<?php include './src/controllers/create_new_item.controller.php'; ?>

<h2>Списък с котки:</h2>
<hr>

<form method="POST" id = "create_new_item__form">
    <select name="create_new_item_type">
        <option value="for_buy">За покупка</option>
        <option value="for_sell">За продажба</option>
    </select>

    <label>Име на котка</label>
    <input type="text" name="create_new_item_name">
    <label>Възраст</label>
    <input type="number" name="create_new_item_age">                    
    
    <label>Дебелина</label>
    <input type="number" name="create_new_item_fat_level">                        
    
    <label>Цвят на козината</label>
    <input type="text" name="create_new_item_fur_collor">                        

    <input type="submit" value="Добави">
    <input type="hidden" name="tokken" value="1">
</form>

                
<?php include './src/templates/footer.php'; ?>
