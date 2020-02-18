<?php 
    session_start();     
    
    include './utils/user-managment.php';
    include './ui/market-managment.php';
?> 
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <h2> <?php  display_nickname(); ?> </h2>
        
        <?php 
            var_dump($_GET);
            echo "<img src='" . $_GET['img'] . "'>";
        ?>
        
    </body>
</html>
