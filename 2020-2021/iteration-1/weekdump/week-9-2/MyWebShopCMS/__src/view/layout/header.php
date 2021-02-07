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
    <link rel="stylesheet" href="<?php css("components/product.component.css")      ?>"/>
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
                            <li><?php a("profile", "Потребителски профил"); ?></li>                            
                        </ul>                    
                    <?php endif; ?>
                    
                    <?php if(User::hasRoleModerator()): ?>
                        <ul>
                            <li><?php a("profile", "Модераторски профил"); ?></li>                                                        
                        </ul>                                        
                    <?php endif; ?>

                    <?php if(User::hasRoleAdmin()): ?>
                        <ul>
                            <li><?php a("create_product", "създаване на продукти"); ?></li>
                            <li>|</li>
                            <li><?php a("create_category", "създаване на категории"); ?></li>
                        </ul>                                                       
                    <?php endif; ?>                    
                    
                    
                    <?php if(User::isGuest()): ?>
                        <ul>
                            <li><?php a("home", "Начало"); ?></li>
                            <li>|</li>
                            <li><?php a("signup", "Регистрация"); ?></li>
                            <li>|</li>
                            <li><?php a("signin", "Вход"); ?></li>
                        </ul>
                    <?php endif; ?>
                    
                    <?php if(User::isAuthenticated()): ?>
                        <ul>
                            <li><?php a("home", "Начало"); ?></li>
                            <li>|</li>
                            <li><?php a("teller", "Продукти"); ?></li>
                            <li>|</li>
                            <li><?php a("profile", "Профил"); ?></li>                            
                            <li>|</li>
                            <li><?php a("logout", "Изход"); ?></li>
                        </ul>                    
                    <?php endif; ?>                    
                </div>         
            </div>
        </div>
    </div>  