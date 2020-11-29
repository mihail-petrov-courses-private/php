<?php include('./templates/admin/header.php'      ); ?>
<?php include('./src/util/static_list.php'   ); ?>
<?php include('./src/controllers/admin.php' ); ?>

<div class="wrapper">
    
    <form method="post">
        <input type="text" 
               name="post_title" 
               placeholder="Post title">
        
        <?php getCategoryStaticList('post_category'); ?>
        
        <textarea name          = "post_content" 
                  placeholder   = "Post content"></textarea>
        
        <textarea name          = "post_preview_content" 
                  placeholder   = "Post preview content"></textarea>        
        
        <input type     = "hidden" 
               name     = "create_new_post_tokken" 
               value    = "1">
        <input type     = "submit" 
               value    = "Създай нов пост">
        
    </form>
    
    
</div>
<?php include('./templates/admin/footer.php'); ?>