<?php include('./templates/admin/header.php'            ); ?>
<?php include('./src/util/static_list.php'              ); ?>
<?php include('./src/controllers/admin_category.php'    ); ?>

<div class="wrapper">
    
    <form>
        
        <ul>
            <?php 
            
            $categoryCollection = getApplicationCategoryCollection();
            foreach ($categoryCollection as $key => $value) { ?>
            <li>
                <?php echo $value['title']; ?> 
                <div>
                    <a class="btn" href="?action=edit&category_id=<?php echo $value['id']; ?>"> Промяна</a>
                    <a class="btn" href="?action=delete&category_id=<?php echo $value['id']; ?>">Изтриване</a>
                </div>
            </li>
            <?php } ?>
        </ul>
        <hr>
        
        <input type         = "hidden"
               name         = "admin_action_tokken"
               value        = <?php echo getAdminActionTokken(); ?>>
        
        <input type         = "hidden"
               name         = "admin_category_tokken"
               value        = <?php echo getCategoryTokken(); ?>>        
        
        <input type         = "text" 
               name         = "category_title" 
               placeholder  = "Category title"
               value        = "<?php echo getAdminCategory() ?>">
        <input type         = "submit">
        
        
    </form>
    
    
</div>
<?php include('./templates/admin/footer.php'); ?>