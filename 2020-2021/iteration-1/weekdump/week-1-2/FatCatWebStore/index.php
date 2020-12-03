<?php 
    $webApplicationTitle = "Fat Cat Web Store";
    $isUserLogedIn = true; 
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
                /*
                    echo "<strong>";            
                    echo $webApplicationTitle;  
                    echo "</strong>";        
                 */
                
                // ''; - standart string
                // echo '<strong> $webApplicationTitle <strong>';
                
                // ""; - parse variable data
                echo "<strong> $webApplicationTitle <strong>";
                
                ?>
                
            </div>
            
            <div id="top--navigation">
                <ul>
                    <?php 
                        
//                        if($isUserLogedIn) { // true
//                            echo "<li>Home</li> <li>Store</li>";
//                        }
//                        else { // false
//                            echo "<li>Home</li><li>Sign in</li><li>Sign up</li>";
//                        }
                    ?>
                    <?php $isUserLogedIn = false;  ?>
                    <?php if($isUserLogedIn) :  ?>
                        <li>Home</li>
                        <li>Store</li>
                    <?php else: ?>
                        <li>Home</li>
                        <li>Sign in</li>
                        <li>Sign up</li>                    
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        
        <div id="wrapper">
            <div id="body"></div>
        </div>
        
        <div id=""footer></div>
    </body>
</html>
