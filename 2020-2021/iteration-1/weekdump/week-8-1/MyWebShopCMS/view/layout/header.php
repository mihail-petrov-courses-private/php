<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php css("vendor/grid.css")                       ?>"/>
    <link rel="stylesheet" href="<?php css("style.css")                             ?>"/>
    <link rel="stylesheet" href="<?php css("components/header.component.css")       ?>"/>
    <link rel="stylesheet" href="<?php css("components/placeholder.component.css")  ?>"/>
    <link rel="stylesheet" href="<?php css("components/form.component.css")         ?>"/>
    <link rel="stylesheet" href="<?php css("components/menu.component.css")         ?>"/>
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
                    
                    <?php if(User::hasRoleUser()): ?>
                        <ul>
                            <li><a href="index.php">Потребителски профил</a></li>
                        </ul>                    
                    <?php endif; ?>
                    
                    <?php if(User::hasRoleModerator()): ?>

                        <ul>
                            <li><a href="index.php">Модераторски профил</a></li>
                        </ul>                                        
                    <?php endif; ?>

                    <?php if(User::hasRoleAdmin()): ?>

                        <ul>
                            <li><a href="admin/product.php">създаване на продукти</a></li>
                            <li><a href="admin/category.php">създаване на категории</a></li>
                        </ul>                                                       
                    <?php endif; ?>                    
                    
                    
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
                            <li>|</li>
                            <li><a href="<?php echo url('view/layout/'); ?>logout.php">Изход</a></li>
                        </ul>                    
                    <?php endif; ?>                    
                </div>         
            </div>
        </div>
    </div>  