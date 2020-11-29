<?php include './util/init.php';?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        
        <div id="header">
            <h1 class="web-logo">Flash Cat</h1>
            
            <?php  if(isUserLogedIn()) sessionMessage(); ?>
            
            <ul id="menu">
                
                <?php if(isUserLogedIn()) { ?>
                    <li><a href="logout.php">[Log out]</a></li>
                <?php } ?>
                    
                <li><a href="index.php">Home</a></li>
                <li><a href="price.php">Price</a></li>
                
                <?php if(isUserLogedIn()) { ?>
                <li><a href="products.php">Products</a></li>
                <li><a href="sell.php">@Sell you cat</a></li>
                <?php } ?>
            </ul>
        </div>
        
        <div id="wrapper">