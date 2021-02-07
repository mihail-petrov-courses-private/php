<?php  $dynamicInstance     = new TellerController();  
       $productCollection   = $dynamicInstance->index();
       $dynamicInstance->markProductForBuy();
?>

<h2>Списък с продукти</h2>

<div class="product--collection">
    
    <?php foreach ($productCollection as $element): ?>
        <div class="product--element">
            <div class="w-px-210 display-inline-block"><?php echo $element['title'] ?></div>
            <div class="w-px-210 display-inline-block"><?php echo $element['price'] ?></div>
            <div class="w-px-210 display-inline-block"><?php echo $element['quantity'] ?></div>
            <div class="w-px-210 display-inline-block">
                <a href="?action=mark&id=<?php echo $element['id']   ?>">Добави в количка</a>
            </div>
        </div>
    <?php endforeach; ?>
    
</div>