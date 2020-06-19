<?php 
    session_start();     
    
    include './ui/page.php';
    include './utils/user-managment.php';
    include './ui/market-managment.php';
    include './utils/redirect.php';
    include './utils/db.php';
    
    if(is_user_already_loged_in()) {
        redirect("dashboard.php");
    }
?> 
<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="style/dashboard.css">
        <link rel="stylesheet" href="style/login.css">
    </head>
    <body>
        
<header id='header'> 
    <div>Fat Cat Market</div> 
</header>