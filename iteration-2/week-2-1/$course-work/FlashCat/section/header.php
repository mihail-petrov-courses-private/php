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
            
            <?php 
                
                // Get data from session variable 
                if(isUserLogedIn()) {
                    echo "Hi my name is " . $_SESSION['full_name'];
                }
                else {
                    
                    // Store user name into session variable 
                    $hasFname       = (isset($_GET["fname"]) AND (strlen($_GET["fname"]) > 0));
                    $hasLname       =  isset($_GET["lname"]);
                    $hasFullName    =  $hasFname AND $hasLname;

                    if($hasFullName) {

                        $_SESSION['full_name'] = $_GET["fname"]  . ' ' . $_GET["lname"];
                        echo "Hi my name is " . $_SESSION['full_name'];
                    }
                }
            
            ?>
            

            <ul id="menu">
                
                <?php if(isUserLogedIn()) { ?>
                    <li><a href="logout.php">[Log out]</a></li>
                <?php } ?>
                    
                <li><a href="index.php">Home</a></li>
                <li><a href="price.php">Price</a></li>
            </ul>
        </div>
        
        <div id="wrapper">