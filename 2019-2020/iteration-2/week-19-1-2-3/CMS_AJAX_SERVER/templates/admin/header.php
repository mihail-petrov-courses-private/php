<?php session_start(); ?>
<?php include './src/db/Database.php';      ?>
<?php include './src/models/Auth.php';      ?>
<?php include './src/util/form.php';        ?>
<?php include './src/util/redirect.php';    ?>

<html>
    
<head>
    <title>title</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
      
<div id="header">
    
    <h1 class   = "logo">@CMS Admin</h1>
    
    <div id     = "cms-manager">
        
        <?php if(Auth::isAuthenticated()) { ?>        
        <ul>
            <li class="list-item"><a href="signout.php">Sign out</a></li>
        </ul>
        <?php } ?>
        
        <?php if(Auth::isModerator() OR  
                 Auth::isAdmin()) { ?>        
        <ul>
            <li class="list-item"><a href="admin_post.php">Admin post managment</a></li>
        </ul>
        <?php } ?>        
        
        <?php if(Auth::isAdmin()) { ?>        
        <ul>
            <li class="list-item"><a href="admin_category.php">Admin category</a></li>
        </ul>
        <?php } ?>                
        
        
    </div>
</div>
<div id="content">