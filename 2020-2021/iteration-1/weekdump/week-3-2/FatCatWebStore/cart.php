<?php include './src/data.php'; ?>
<?php include './src/application.php'; ?>
<?php include './src/templates/header.php'; ?>
                
<?php  // 1. Get cat collection from user session ?>

<table>
    <thead>
        <th>Cat name</th>
        <th>Fat level</th>
        <th>Fur color</th>
        <th>Age</th>
    </thead>
<?php foreach (get_cart() as $element): ?>
    <tr>
    <td><?php echo $element['name'      ]; ?></td>
    <td><?php echo $element['fat_level' ]; ?></td>
    <td><?php echo $element['fur_color' ]; ?></td>
    <td><?php echo $element['age'       ]; ?></td>
    </tr>                
<?php endforeach; ?>
</table>


<?php include './src/templates/footer.php'; ?>