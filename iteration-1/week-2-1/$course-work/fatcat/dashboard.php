<html>
    <head>
        <title>title</title>
        <style>
            
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
            
        </style>
    </head>
    <body>
        <?php 
          
            // Simple foreach
            $catRandomDataCollection = array(
                'Mazi', 'Pisi', 'Random Cat'
            );
            
            foreach ($catRandomDataCollection as $catElement) {
                echo "<div class='element'>$catElement</div>";
            }
            
            // Complex : key - value foreach
            $catArtefactCollection = array(
                'name'      => 'Maza',
                'age'       => 16,
                'img'       => '',
                'address'   => 'Plovdiv 24'
            );
            
            foreach($catArtefactCollection as $key => $value) {
                
                // valid but incorect
                // echo $catArtefactCollection[$key];
                
                // valid and correct approach
                echo "<div class='complex-element'>$key : $value</div>";   
            }
             
            // nested array collection foreach
            $catArtefactForBay = array(
                array(
                   'name'      => 'Maza',
                   'age'       => 16,
                   'img'       => '',
                   'address'   => 'Plovdiv 24'
                ),
               array(
                'name'      => 'Prusho',
                'age'       => 8,
                'img'       => '',
                'address'   => 'Sofia 24'
                )                
            );
            
            function displayCatElement($catElementCollection) {
                
                foreach ($catElementCollection as $catKey => $catValue) {
                    echo "<div class='cat-for-buy'>$catKey : $catValue</div>";
                }                
            }
            
            
            foreach ($catArtefactForBay as $catCollection ) {
                
                echo "<div class='cat-wrapper'>";
                displayCatElement($catCollection);
//                foreach ($catCollection as $catKey => $catValue) {
//                    echo "<div class='cat-for-buy'>$catKey : $catValue</div>";
//                }
                echo "</div>";
            }
            
            
            
            $catArtefactForSell= array(
                array(
                   'name'      => 'Vafla',
                   'age'       => 10,
                   'img'       => '',
                   'address'   => 'Haskovo 24'
                ),
               array(
                'name'      => 'Churchil',
                'age'       => 5,
                'img'       => '',
                'address'   => 'Pleven 16'
                )                
            );
        

        ?>
        
        <h2>Fat Cat Market</h2>
        
        
    </body>
</html>
