<?php include './src/config/constants.php'; ?>
<?php include './src/application.php';  ?>
<?php include './src/db/database.php';  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        
        <div id="header">
            
            <div id="slogan">
                
                <?php  slogan(); ?>
                
            </div>
            
            <div id="top--navigation">
                <ul>
                    <?php if(is_user_loged_in()) : ?>
                    <li class='list--item'><a href='index.php'>Home</a></li>
                    <li class='list--item'><a href='store.php'>Store</a></li>
                    <li class='list--item'><a href='cart.php'>Cart</a></li>
                    <li class='list--item'><a href='logout.php'>Logout</a></li>
                    <?php else: ?>
                    <li class='list--item'><a href='index.php'>Home</a></li>
                    <li class='list--item'><a href='signin.php'>Sign in</a></li>
                    <li class='list--item'><a href='signup.php'>Sign up</a></li>
                    <?php endif; ?>
                </ul>   
            </div>
        </div>
        
        <div id="wrapper">
            <div id="body">