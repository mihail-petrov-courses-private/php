<?php 

    session_start();     
    // include './utils/session.php';
    include './utils/user-managment.php';
    include './utils/market-managment.php';
    
    // Very mportant problem
    // include './session.php';
    //include './utils/session.php';
    //
    //function set_user_nickname($nickname) {
    //    set_session_key('visitor_user_nick_name', $nickname);
    //}
    //
    //function get_user_nickname() {
    //        
    //    if(empty(get_session_key('visitor_user_nick_name'))) {
    //        return 'visitor';
    //    }
    //    
    //    return get_session_key('visitor_user_nick_name');
    //}
    
    
    
?> 
<html>
    <head>
        <title>title</title>
        <style>
            
            * {
                margin: 0;
                padding : 0;
            }
            
            #header {
                background: #dedede;
                border-bottom: solid #ff0000 1px
            }
            
            .element {
                border  : solid #dedede 1px;
                margin  : 5px;
            }
            
            .complex-element {
                border  : solid #ff0000 1px;
                margin  : 5px;
            }
            
            .cat-wrapper {
                background: #dedede;
                border: solid 1px #ff0000;
            }
            
            .cat-for-buy {
                margin: 4px;
            }
            
            .cat-banner {
                width: 126px;
                
            }
            
        </style>
    </head>
    <body>
        
        <header id="header">
            
            <?php 
                $nickname = get_user_nickname();
                echo "Hi $nickname"; 
            ?>
        </header>
        
        <h2>Fat Cat Market</h2>
        
        <h3>Buy fat Cat</h3>
        <?php 
            $catArtefactForBuy= array(
                array(
                   'name'      => 'Maza',
                   'age'       => 16,
                   'img'       => 'cats/img1.jpg',
                   'address'   => 'Vidin 24'
                ),
               array(
                'name'      => 'Prusho',
                'age'       => 2,
                'img'       => 'cats/img2.jpg',
                'address'   => 'Plovdiv 24'
                )                
            );
            
            //display_item_collection($catArtefactForBuy);        
            display_item_collection_for_buy($catArtefactForBuy);
        ?>
        
        <h3>Sell fat Cat</h3>        
        <?php 
            $catArtefactForSell= array(
                array(
                   'name'      => 'Vafla',
                   'age'       => 10,
                   'img'       => 'cats/img3.jpg',
                   'address'   => 'Haskovo 24'
                ),
               array(
                'name'      => 'Churchil',
                'age'       => 5,
                'img'       => 'cats/img7.jpg',
                'address'   => 'Pleven 16'
                )                
            );
        
            // Display sell items
            //display_item_collection($catArtefactForSell);            
            display_item_collection_for_sell($catArtefactForSell);
        ?>
        
    </body>
</html>
