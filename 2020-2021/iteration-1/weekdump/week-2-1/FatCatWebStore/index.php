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
//                    echo "<strong> $webApplicationTitle <strong>";
//                    echo "<span>$webApplicationVisitorUsername</span>";
                    slogan($webApplicationVisitorUsername);
                    // application_slogan("My Cool Fat Cat application", "Petar Petrov");
                ?>
                
            </div>
            
            <div id="top--navigation">
                <ul>
                    <?php main_menu($isUserLogedIn);?>
                </ul>
            </div>
        </div>
        
        <div id="wrapper">
            <div id="body">
                
                
                <form id="form--welcome-user" method="POST">
                    <input type="text" name="username" placeholder="Как се казваш. Машина">
                    <input type="text" name="userage" placeholder="На колко си години ?">
                    <input type="submit" value="Здрасти">
                </form>
                
                
            </div>
        </div>
        
        <div id=""footer></div>
    </body>
</html>
