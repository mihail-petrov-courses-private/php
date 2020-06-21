<?php include './section/header.php'        ?>
<?php include './util/product_manager.php'  ?>

<h2>Foreach Loop : product collection</h2>
<?php foreach(getProductCollection() as $catProductElement): ?>
<div class="panel">
    <div><?php echo $catProductElement['name']; ?></div>
    <div><?php echo $catProductElement['description']; ?></div>
    
    <div><?php echo $catProductElement['price']; ?></div>
    <div>
        <a href="?action=buy">Buy this cat</a>
    </div>
</div>
<?php endforeach; ?>





<?php include './section/footer.php' ?>