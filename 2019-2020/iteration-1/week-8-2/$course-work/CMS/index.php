<?php
    include './external_autoload.php';
    
    $indeControllerReference = new controllers\IndexController();
    $indeControllerReference->index();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CMS</title>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/public.css">
    </head>
    <body>
        
        <div id="application-header" class="web-header">
            <h1 class="logo">CMS</h1>
        </div>
            
        <div id="blog">
            <div id="category-header" class="component">
                <ul class="category-list">
                    <li class="category">Жълтини</li>
                    <li class="category">Клюки</li>
                    <li class="category">Истерии</li>
                    <li class="category">Скандали</li>
                </ul>
            </div>
                        
            <div id="content" class="component">
                
                <?php 
                
                foreach ($indeControllerReference->getBlogPostCollection() as $value) {
                    
                   echo "<div class='post'>";
                   echo "<header class='post-title'>{$value['title']}</header>";
                   echo "<div class='post-timestamp'>преди 1 час</div>";
                   echo "<a href='#'> - </a>";
                   echo "</div>";
                }

                ?>
                
                
                
<!--                <div class="post">
                    <header class="post-title">Голям скандал</header>
                    <div class="post-timestamp">преди 1 час</div>
                    <a href="#"> - </a>
                </div>
                
                <div class="post">
                    <header class="post-title">Голям скандал</header>
                    <div class="post-timestamp">преди 1 час</div>
                    <a href="#"> - </a>
                </div>

                <div class="post">
                    <header class="post-title">Пълен потрес</header>
                    <div class="post-timestamp">преди 5 часа</div>
                    <a href="#"> - </a>
                </div>

                <div class="post">
                    <header class="post-title">Не вярвам на ушите си</header>
                    <div class="post-timestamp">преди 10 часа</div>
                    <a href="#"> - </a>
                </div>-->
                
            </div>
        </div>
        
    </body>
</html>
