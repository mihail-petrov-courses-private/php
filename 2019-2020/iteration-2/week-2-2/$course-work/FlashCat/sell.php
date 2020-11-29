<?php include './section/header.php';       ?>
<?php include './util/product_manager.php'  ?>

<?php 

    $productName        = isset($_POST['product_name'])         ? $_POST['product_name']        : NULL;
    $productPrice       = isset($_POST['product_price'])        ? $_POST['product_price']       : NULL;
    $productDescription = isset($_POST['product_description'])  ? $_POST['product_description'] : NULL;
        
    if(isset($_POST['add_new_product_tokken']) && $_POST['add_new_product_tokken'] == '1') {
        
        // addNewProduct($productName, $productPrice, $productDescription);
        addNewProduct(array(
            'product_name'          => $productName,
            'product_price'         => $productPrice,
            'product_description'   => $productDescription
        ));
        
        echo "<div>New product is added</div>";    
    }
?>

<form method="POST">
    <input type="text" name="product_name" placeholder="Cat full name">
    <br/>
    <input type="text" name="product_price" placeholder="How match ? ">
    <br/>
    <textarea name="product_description"></textarea>
    <input type="hidden" name="add_new_product_tokken" value="1">
    <input type="submit">
</form>
            
<?php include './section/footer.php' ?>