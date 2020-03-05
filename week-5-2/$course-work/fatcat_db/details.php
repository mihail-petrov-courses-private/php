<?php include './ui/web-header.php' ?>

<?php 

    $catElementId = $_GET['id'];
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