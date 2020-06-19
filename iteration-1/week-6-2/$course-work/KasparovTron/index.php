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
            
            
            .B {
                background      : #ff0000;
                width           : 20px;
                height          : 20px;
                border-radius   : 5px;
                text-align      : center;
                margin: auto
            }
            
            .W {
                background      : #00ff00;
                width           : 20px;
                height          : 20px;
                border-radius   : 5px;
                text-align      : center;
                margin: auto
            }            
            
        </style>
        
    </head>
    <body>
        <?php    
        
            error_reporting(E_ALL & ~E_NOTICE);
            
            include './chess/Piece.php';
            include './chess/Pawn.php';
            include './chess/Bishop.php';
            include './chess/Rook.php';
            include './chess/Knight.php';
            include './chess/King.php';
            include './chess/Queen.php';
            include './chess/GameBoard.php';
            $kasparovTronBoard = new GameBoard(10, 10);
            echo $kasparovTronBoard->display();

        ?>
    </body>
</html>
