<h2>Списък с продукти</h2>

<div class="product--collection">
    
    <?php foreach ($productCollection as $element): ?>
        <div class="product--element">
            <div class="w-px-210 display-inline-block"><?php echo $element['title'] ?></div>
            <div class="w-px-210 display-inline-block"><?php echo $element['price'] ?></div>
            <div class="w-px-210 display-inline-block"><?php echo $element['quantity'] ?></div>
            <div class="w-px-210 display-inline-block">
                <?php a('teller/mark', 'Добави в количка', ['id' => $element['id']]); ?>
            </div>
        </div>
    <?php endforeach; ?>
    
</div>