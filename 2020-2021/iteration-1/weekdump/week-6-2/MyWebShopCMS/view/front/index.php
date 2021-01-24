<?php 

include '../../src/database/Database.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         Database::query('INSERT INTO tb_categories(title) VALUES("Sample Sample 5")');
        ?>
    </body>
</html>
