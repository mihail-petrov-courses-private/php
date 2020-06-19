<?php include './ui/web-header.php' ?>

<?php 
    //var_dump($_GET);
    //echo "<img src='" . $_GET['img'] . "'>";

    
    //Read full text file 
    //$fileHandler = fopen('cat_db.txt', 'r');
    //$fileContent = fread($fileHandler, filesize('cat_db.txt'));
    //echo $fileContent;
    
    $catElementId = $_GET['id'];
    // echo $catElementId;


    // Read file line by line
//    $fileHandler = fopen('cat_db.txt', 'r');
//    while($line = fgets($fileHandler)) {
//        
//        $phpElement = json_decode($line, true);
//        if($phpElement['id'] == $catElementId) {
//            
//            echo $phpElement['name'];
//            echo $phpElement['age'];
//            // echo "<img src='" . $phpElement['img'] . "'>";
//            echo "<img src='{$phpElement['img']}'>";
//        }
//    }
    
    // JSON
    // Refactoring of cat collection get data from function
    
    $catElementCollection = get_cat_collection();
    foreach ($catElementCollection as $element) {
        
        if($element['id'] == $catElementId) {
            echo $element['name'];
            echo $element['age'];
            // echo "<img src='" . $phpElement['img'] . "'>";
            echo "<img src='{$element['img']}'>";
        }
    }
?>

<?php include './ui/web-footer.php'; ?>