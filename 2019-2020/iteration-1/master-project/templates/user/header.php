<?php session_start(); ?>
<?php include './src/db/Database.php';      ?>
<?php include './src/models/Auth.php';      ?>
<?php include './src/util/form.php';        ?>
<?php include './src/util/Pagination.php';        ?>
<?php include './src/util/redirect.php';    ?>

<html>
    
<head>
    <title>title</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
      
<div id="header">
    
    <h1 class   = "logo">@CMS</h1>
    
    <div id     = "cms-manager">
        <?php if(Auth::isNotAuthenticated()) { ?>        
        <ul>
            <li class="list-item"><a href="signin.php">Sign in</a></li>
            <li class="list-item"><a href="signup.php">Sign up</a></li>
        </ul>
        <?php } ?>
        
        <?php if(Auth::isAuthenticated()) { ?>        
        <ul>
            <li class="list-item"><a href="signout.php">Sign out</a></li>
        </ul>
        <?php } ?>        
    </div>
</div>
<div id="content">