<?php 
    include './src/application.php';
?>
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
                
                <?php 
                    slogan($webApplicationVisitorUsername);
                ?>
                
            </div>
            
            <div id="top--navigation">
                <?php main_menu($isUserLogedIn); ?>
            </div>
        </div>
        
        <div id="wrapper">
            <div id="body">
                SIGN UP 
            </div>
        </div>
        
        <div id=""footer></div>
    </body>
</html>
