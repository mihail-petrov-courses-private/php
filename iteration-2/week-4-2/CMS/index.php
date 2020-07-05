<?php include './src/db/database.php'; ?>

<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
      
        <div id="header">
            <h1>@CMS</h1>
        </div>
        <div id="content">
            
            <ul id="category-placeholder">
                <li class="category-placeholder--category">Клюки</li>
                <li class="category-placeholder--category">Политика</li>
                <li class="category-placeholder--category">Програмиране</li>
            </ul>
            
            <div id="blog-post--content">
                
                <div class="post">
                    <?php 
                    
                    $mysqlResult = query("SELECT * FROM tb_blog_post");
                    while($blogPost = mysqli_fetch_assoc($mysqlResult)) {  ?>
                    
                    <span class="post-title"> <?php echo $blogPost['title']; ?></span>
                    <div class="post-content">
                        <p><?php echo $blogPost['content']; ?> </p>                        
                    </div>                    
                    
                    <?php } ?>
                </div>
            </div>
        </div>
        <div id="footer"></div>
    </body>
</html>
