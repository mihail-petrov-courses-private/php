<?php include '../../src/database/Database.php';                    ?>
<?php include '../../src/controllers/admin/ProductController.php'; ?>
<?php include '../../src/components/dropdown.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST">
            
            <?php dropdownCategory(); ?>
            
            <input  type="text" name="product_title" placeholder="Название на продукта">
            <input  type="text" name="product_price" placeholder="Цена">
            <input  type="text" name="product_quantity" placeholder="Количество">
            <input  type="submit" name="product_submit">
            <input  type="hidden" name="product_tokken" value="1">
        </form>
        <div>
            <?php if(isset($message)) echo $message; ?>
        </div>
    </body>
</html>
