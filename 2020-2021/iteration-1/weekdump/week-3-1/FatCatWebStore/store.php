<?php 
    include './src/application.php';

    $cat1Name       = 'Maza';
    $cat1Price      = '10';
    $cat1Location   = 'Plovdiv';
    
    $cat1Location   = 'Plovdiv';
    
    // Numeric - 1,2,3,4, 5, 6, 10.5
    // String  - 'Hello world'
    // boolean - true / false
    
    
//    $catCollection  = array(
//        
//    );

//    $catNameCollection    = [
//        "Maza", "Pisana", "Kotka Kotka", "Dundio", "Obama"
//    ];
//    
//    $catFatIndexCollection    = [
//        "много дебела", "котка"
//    ];    
//    
//    $catFurColorCollection = ["зелена"];    
    
    
    $catObjectCollection = [
        [
            "name"                  => "Maza", 
            "fat_level"             => "много дебела", 
            "fur_color"             => "червена", 
            "age"                   => 4,
            "is_available_for_buy" => false, 
            "is_available_for_sell" => true
        ],
        [
            "name"                  => "Pisana", 
            "fat_level"             => "дебела", 
            "fur_color"             => "зелена", 
            "age"                   => 2,            
            "is_available_for_buy" => false, 
            "is_available_for_sell" => true
        ],
        [
            "name"                  => "Pisana", 
            "fat_level"             => "слаба", 
            "fur_color"             => "бяла", 
            "age"                   => 3,            
            //"isAvailableForBuy"     => false, 
            //"isAvailableForSell"    => true
            "is_available_for_buy" => true, 
            "is_available_for_sell" => false            
        ]
        //,      
        //['Obama', 24]
    ];
    
    
    
    function doesPrpertyExsist($propertyValue) {
        return !!$propertyValue;
    }
    
    function getCatProperty($propery) {
        
        if(doesPrpertyExsist($propery)) {
            return "<span> $propery</span>";
        }
        return "<span> марсианска технология </span>";
    }
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
                <hr>
                <?php 
                    
                    // for($startCount = 0; $startCount < count($catNameCollection); $startCount++ ) {
                    // for($startCount = 0; $startCount < count($catObjectCollection); $startCount++ ) {
                           
//                        echo '<pre>';
//                        var_dump($catObjectCollection[$startCount]);
//                        echo '</pre>';

//                        echo "<span>";
//                        echo "$catNameCollection[$startCount] - ";
//                        echo "</span>";
//                        
//                        if(isset($catFatIndexCollection[$startCount])) {
//                            echo getCatProperty($catFatIndexCollection[$startCount]);
//                        }
//                        else {
//                            echo "<span> марсианска технология </span>";
//                        }
//                        
//                        if(isset($catFatIndexCollection[$startCount])) {
//                            echo getCatProperty($catFatIndexCollection[$startCount]);
//                        }
//                        else {
//                            echo "<span> черна котка </span>";
//                        }                        
//                            
//                        echo "<br>";
                    //}
                ?>
                
                <table>
                    <thead>
                        <th>Cat name</th>
                        <th>Fat level</th>
                        <th>Fur color</th>
                        <th>Age</th>
                        <th>Buy / Sell</th>
                    </thead>                    
                <?php for($i = 0; $i < count($catObjectCollection); $i++): ?>
                    <tr>
                        <td><?php echo $catObjectCollection[$i]['name'      ]; ?></td>
                        <td><?php echo $catObjectCollection[$i]['fat_level' ]; ?></td>
                        <td><?php echo $catObjectCollection[$i]['fur_color' ]; ?></td>
                        <td><?php echo $catObjectCollection[$i]['age'       ]; ?></td>
                        
                        <?php if($catObjectCollection[$i]['is_available_for_buy']) :?>
                        <td> <a href="buy.php">Buy</a></td>
                        <?php endif; ?>
                        
                        <?php if($catObjectCollection[$i]['is_available_for_sell']) :?>
                        <td> <a href="sell.php">Sell</a></td>
                        <?php endif; ?>                        
                    </tr>
                <?php endfor; ?>
                </table>
                
                <hr>
                
                <table>
                    <thead>
                        <th>Cat name</th>
                        <th>Fat level</th>
                        <th>Fur color</th>
                        <th>Age</th>
                        <th>Buy / Sell</th>
                    </thead>
                <?php foreach ($catObjectCollection as $element): ?>
                    <tr>
                    <td><?php echo $element['name'      ]; ?></td>
                    <td><?php echo $element['fat_level' ]; ?></td>
                    <td><?php echo $element['fur_color' ]; ?></td>
                    <td><?php echo $element['age'       ]; ?></td>

                    <?php if($element['is_available_for_buy']) :?>
                    <td> <a href="buy.php">Buy</a></td>
                    <?php endif; ?>

                    <?php if($element['is_available_for_sell']) :?>
                    <td> <a href="sell.php">Sell</a></td>
                    <?php endif; ?>                        
                    </tr>                
                <?php endforeach; ?>
                </table>
                
                
            </div>
        </div>
        
        <div id=""footer></div>
    </body>
</html>
