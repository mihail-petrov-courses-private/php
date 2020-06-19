<?php
    $visitorNickname        = "too_cool";
    $visitorRealName        = 'Mihail Petrov';
    $visitorName            = "$visitorNickname $visitorRealName";  
    $visitorItemCount       = 10;
    $visitorBonusItemCount  = 1;
    $visitorTotalItemCount  = $visitorItemCount . $visitorBonusItemCount;
?>
<!-- var visitorName; -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <!-- 
        Activities : 
        * buy CACKCREAME INCREMENT SHOP CART
        * SHOW INFORMATION MESSAGE
        * RECORS ACTIVITIES 
     -->

    <?php echo "Welcome to my shop $visitorName"; ?>
    <?php echo "Your total item count is : $visitorTotalItemCount"; ?>

    <?php 
        /* echo "<h1>Cacke Creame Delux v2</h1>" */ 
    ?>

    <h1>
        <?php 
            echo "Cacke Creame Delux v2"; 
        ?>
    </h1>
    

    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa porro explicabo ad repellendus temporibus fugit omnis molestiae dignissimos. Quos harum accusantium aliquid ipsum eaque, impedit veritatis consequatur architecto quibusdam vero?</p>

    <div id="footer">
        <?php echo 'Power by : $visitorName'; ?> 
        <!-- var footerElement = "Power BY" + "Mihail Petrov" --> 
    </div>
</body>
</html>