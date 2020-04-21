<?php
    include './_external_autoload.php';
    
    (new controllers\AdminController())->index();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CMS</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/admin.css">
    </head>
    <body>
        
        <div id="admin-header">
            <h1 class="logo">Admin CMS</h1>
            <div id="admin-header-placeholder">
                <ul>
                    <li><a href="admin.php">Add new</a></li>
                    <li><a href="list-post.php">List posts</a></li>
                    <!-- <li><a href="logout.php">Log out</a></li> -->
                    <li><a href="admin.php?action=logout">Log out</a></li>
                </ul>
            </div>
        </div>
        
        <?php 
            
            if(\session\Session::checkFlashMessage('create_blog_post')) {
                
                echo '<div class="message success">';
                echo \session\Session::getFlashMessage('create_blog_post');
                echo '</div>';                
            }
        ?>            
        
        <div id="admin-editor">
            <form method="POST" name="admin-post-editor">
                <input class        = "form-input" 
                       type         = "text" 
                       placeholder  = "Post title" 
                       name         = "admin-post-editor_post_title" 
                       id           = "post_title">
                
                <textarea class         = "form-textarea h-40"  
                          placeholder   = "Post preview" 
                          name          = "admin-post-editor_post_preview" 
                          id            = "post_preview"></textarea>
                
                <textarea class         ="form-textarea h-160"  
                          placeholder   ="Post content" 
                          name          ="admin-post-editor_post_content"  
                          id            ="post_content"></textarea>
                
<!--                <input class="button" type="submit" name="post_submit">-->
                <select 
                        id   = "admin-post-editor-category">
                    <option value="1">Category 1</option>
                </select>
                
                <input type="hidden" name="post_tokken" value="1">
                <input class="button" type="button" onclick="submitForm()" name="post_submit">
            </form>
        </div>

        <script src="scripts/client/netitquery.js"></script>
        <script src="scripts/vendor/jquery.js"></script>
        <script src="scripts/application/admin/admin.js"></script>                
        
    </body>
</html>
