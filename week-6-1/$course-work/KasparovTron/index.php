<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            
            .black {
                background: #000;
                width:  50px;
                height: 50px;
            }
            
            .white {
                background: #fff;
                width:  50px;
                height: 50px;                
            }
            
        </style>
        
    </head>
    <body>
        <?php
            // function based approach
            // include './chess/real_world_function_objects.php';
            // echo displayBoard();
        
            // Object-oriented programing approach
                
            include './chess/real_world_class_objects.php';
            $kasparovTronBoard = new GameBoard(9);
            echo $kasparovTronBoard->display();
            
            echo $kasparovTronBoard->height
            
            
            //$miniBpard = new GameBoard();
            
            // Cannot access private property
            // $miniBpard->width = 4;
            // $miniBpard->height = 4;
            
            //$miniBpard->setWidth(5);
            //$miniBpard->width = 50;
            //echo $miniBpard->display();
            
            //echo $kasparovTronBoard->display();
            
            
        ?>
    </body>
</html>
