<?php 
    session_start();     
    
    include './ui/page.php';
    include './utils/user-managment.php';
    include './ui/market-managment.php';
    include './utils/redirect.php';
    
    include './db/cats.php';
    
    if(!is_user_already_loged_in()) {
        redirect("index.php");
    }
?> 
<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="style/dashboard.css">
    </head>
    <body>
        
        <header id='header'> 
            <div>Fat Cat Market</div> 
            <div> <?php display_nickname(); ?></div>
            <div> <a href="logout.php">Log out </a></div>
        </header>