<?php 
    include './src/application.php';

    $cat1Name       = 'Maza';
    $cat1Price      = '10';
    $cat1Location   = 'Plovdiv';
    
//    $catCollection  = array(
//        
//    );

    $catNameCollection    = [
        "Maza", "Pisana", "Kotka Kotka", "Dundio", "Obama"
    ];
    

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
                
                <?php  slogan(); ?>
                
            </div>
            
            <div id="top--navigation">
                <?php main_menu(); ?>
            </div>
        </div>
        
        <div id="wrapper">
            <div id="body">
                <h2>Списък с котки:</h2>
                <div><?php echo $catNameCollection[0]; ?></div>
                <div><?php echo $catNameCollection[1]; ?></div>
                <div><?php echo $catNameCollection[2]; ?></div>
                <div><?php echo $catNameCollection[3]; ?></div>
                <hr>
                <?php 
                    
                    // Alternatives
                    // $i = $i + 1  <==>  $i += 1 <==> $i++
                
                    // for($i = 0; $i < 10; $i = $i + 1) 
                    // for($i = 0; $i < count($catNameCollection); $i += 1) 
                    for($i = 0; $i < count($catNameCollection); $i++) 
                    {
                        echo $catNameCollection[$i]; // 4 // 5
                        echo "<br>";
                    }
                ?>
                
                
            </div>
        </div>
        
        <div id=""footer></div>
    </body>
</html>
