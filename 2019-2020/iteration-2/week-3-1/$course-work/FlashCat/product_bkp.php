<?php include './section/header.php' ?>


<?php 

// Bad idea
//    $productCollection      = array("Maza", "Pisana", "Prusho", "Obama");
//    $descriptionCollection  = array("fat cat", "Slim cat", "Flufy cat", "White cat");
//    $priceCollection        = array("10.5 BGN", "10.5 EUR", "250 SKU");

$productCollection = array(
    array("name" => "Maza", "description" => "Fat cat", "price" => '10.5 BGN')  ,
    array("name" => "Pisana", "description" => "Slim cat", "price" => '12 USD') ,
    array("name" => "Prusho", "description" => "Flufy cat", "price" => '5 EUR') ,
    array("name" => "Obama", "description" => "White cat", "price" => '250 SEK'),    
);
?>

<h2>For Loop : product collection</h2>
<?php  for($i = 0; $i < count($productCollection); $i++) { ?>
<div class="panel">
    <div><?php echo $productCollection[$i]['name']; ?></div>
    <div><?php echo $productCollection[$i]['description']; ?></div>
    
    <!-- TODO: check furder solution -->
    <div><?php // echo isset($priceCollection[$i]['price']) ? $priceCollection[$i]['price'] : '[no price]' ; ?></div>
    <div><?php echo $productCollection[$i]['price']; ?></div>
    <div>
        <a href="?action=buy">Buy this cat</a>
    </div>
</div>
<?php  } ?>

<h2>Foreach Loop : product collection</h2>
<?php foreach($productCollection as $catProductElement): ?>
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