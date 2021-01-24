<?php 
session_start();

function baseurl($path) {
    
    $projectName = explode('/', $_SERVER['REQUEST_URI'])[1];
   
    return $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/' . $projectName . '/' . $path;
}

function load_controller($controller) {
    include baseurl("src/controllers/front/$controller.php");
}

function redirect($page) {
    header("Location: $page.php");
}

?>

<?php include baseurl('src/database/Database.php');     ?>
<?php include baseurl('src/validation/Validator.php');  ?>
<?php include baseurl('src/message/Message.php');       ?>
<?php include baseurl('src/user/User.php');             ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/vendor/grid.css"/>
    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="stylesheet" href="../../css/components/header.component.css"/>
    <link rel="stylesheet" href="../../css/components/placeholder.component.css"/>
    <link rel="stylesheet" href="../../css/components/form.component.css"/>
    <link rel="stylesheet" href="../../css/components/menu.component.css"/>
</head>
<body>
    
    <!-- BEM (BLOCK - ELEMENT - MODIFICATOR) -->
    <div id="component--header">
        
        <div class="row">
            <div class="col-xs-4">
                <div id="component--header-logo">
                    CMS WEB SHOP
                </div>
            </div>
            
            <div class="col-xs-8">
                <div id="component--menu">
                    
                    <?php if(User::isGuest()): ?>
                        <ul>
                            <li><a href="index.php">Начало</a></li>
                            <li>|</li>
                            <li><a href="signup.php">Регистрация</a></li>                        
                            <li>|</li>
                            <li><a href="signin.php">Вход</a></li>
                        </ul>                    
                    <?php endif; ?>
                    
                    <?php if(User::isAuthenticated()): ?>
                        <ul>
                            <li><a href="index.php">Начало</a></li>
                            <li>|</li>
                            <li><a href="teller.php">Продукти</a></li>                        
                            <li>|</li>
                            <li><a href="profile.php">Профил</a></li>
                        </ul>                    
                    <?php endif; ?>                    
                </div>         
            </div>
        </div>
    </div>  