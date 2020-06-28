<?php include './section/header.php'        ?>
<?php include './util/product_manager.php'  ?>


<?php 
    
    $action     = isset($_GET['action'])    ? $_GET['action'] : null;
    $productId  = isset($_GET['id'])        ? $_GET['id'] : null ;
       
    if($action == 'buy') {
        setThisProductForPendingPurchase($productId);
    }
    
?>

<h2>Foreach Loop : product collection</h2>
<?php foreach(getProductCollection() as $catProductElement): ?>
<div class="panel">
    <div><?php echo $catProductElement['name']; ?></div>
    <div><?php echo $catProductElement['description']; ?></div>
    
    <div><?php echo $catProductElement['price']; ?></div>
    <div>
        <?php $href = "?action=buy&id=" . $catProductElement['id'];
              echo "<a href=$href>Buy this cat</a>" ?>
    </div>
</div>
<?php endforeach; ?>





<?php include './section/footer.php' ?>