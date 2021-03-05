<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php 
        
        function get_directory_files($path) {
            
            $dirCollection = scandir($path);
            array_shift($dirCollection);
            array_shift($dirCollection);
            
            return $dirCollection;
        }
        

        // .... 
        $collection = get_directory_files('upload');
        
        function get_image($element) {
            return "upload/$element";
        }
        
        // 
        foreach ($collection as $element): ?>
            <img src="<?php echo get_image($element); ?>"/>
        <?php endforeach; ?>
        
    </body>
</html>
