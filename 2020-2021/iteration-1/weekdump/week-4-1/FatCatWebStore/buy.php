<?php include './src/templates/header.php'; ?>
<?php include './src/controllers/buy.controller.php'; ?>
                
<form method="POST">
    <input type="text"      name="address" placeholder="адрес за доставка">
    <input type="submit"    value="Купи">
    <input type="hidden"    name="tokken" value="1">
</form>



<?php include './src/templates/footer.php'; ?>