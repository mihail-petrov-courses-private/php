<?php include './src/templates/header.php'; ?>
<?php include './src/controllers/store.controller.php'; ?>

<h2>Списък с котки:</h2>
<hr>
<a href="create_new_item.php">Нова котка</a>
<hr>

<form method="GET">
    <select name="search_category">
        <option value="fat_level">Дебелина</option>
        <option value="fur_color">Цвят</option>
        <option value="age">Възраст</option>
    </select>
    <input type="text" name="search_category_value">

    <label>За покупка</label>
    <input type="radio" name="search_category_buy_sell" value="is_available_for_buy">                    
    <label>За продажба</label>
    <input type="radio" name="search_category_buy_sell" value="is_available_for_sell">                    

    <input type="submit" value="Търси">
    <input type="hidden" name="tokken" value="1">
</form>

<hr>
<table>
    <thead>
        <th>Cat name</th>
        <th>Fat level</th>
        <th>Fur color</th>
        <th>Age</th>
        <th>Buy / Sell</th>
    </thead>
<?php foreach ($catObjectCollection as $element): ?>
    <tr>
    <td><?php echo $element['name'      ]; ?></td>
    <td><?php echo $element['fat_level' ]; ?></td>
    <td><?php echo $element['fur_color' ]; ?></td>
    <td><?php echo $element['age'       ]; ?></td>

    <?php if($element['is_available_for_buy']) :?>
    <td> <a href='<?php $id = $element['id']; echo "buy.php?id=$id"; ?>'>Buy</a></td>
    <?php endif; ?>

    <?php if($element['is_available_for_sell']) :?>
    <td> <a href="<?php $id = $element['id']; echo "sell.php?id=$id"; ?>">Sell</a></td>
    <?php endif; ?>              
    
    <td> <a href="<?php $id = $element['id']; echo "remove_item.php?id=$id"; ?>">Remove</a></td>
    
    </tr>                
<?php endforeach; ?>
</table>
                
<?php include './src/templates/footer.php'; ?>
