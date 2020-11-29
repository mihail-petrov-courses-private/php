<?php include './ui/web-header.php' ?>
                
<form method="POST">
    <select name="filter_category">
        <option value="all">Всички</option>
        <option value="buy">За покупка</option>
        <option value="sell">За продажба</option>
    </select>
    <input type="hidden" name="selection_tokken" value="1">
    <input type="submit" value="Филтрирай"> 
</form>

<h2>Fat Cat Market</h2>

<?php 

$catArtefactCollection = get_cat_collection();


//    $catArtefactCollection = array();
//    $fileHandler = fopen("cat_db.txt", "r");
//    
//    while($line = fgets($fileHandler)) {
//        
//        $collectionElement = json_decode($line, true);
//        array_push($catArtefactCollection, $collectionElement);
//    }
    


//    $catArtefactCollection = array(
//        array(
//           'id'      => '1',
//           'name'      => 'Maza',
//           'age'       => 16,
//           'img'       => 'cats/img1.jpg',
//           'address'   => 'Vidin 24',
//           '_action'   => 'buy'
//        ),
//       array(
//        'id'      => '2',
//        'name'      => 'Prusho',
//        'age'       => 2,
//        'img'       => 'cats/img2.jpg',
//        'address'   => 'Plovdiv 24',
//        '_action'   => 'buy'                   
//        ),
//        array(
//           'id'      => '3',
//           'name'      => 'Vafla',
//           'age'       => 10,
//           'img'       => 'cats/img3.jpg',
//           'address'   => 'Haskovo 24',
//            '_action'   => 'sell'                   
//        ),
//       array(
//        'id'      => '4',
//        'name'      => 'Churchil',
//        'age'       => 5,
//        'img'       => 'cats/img7.jpg',
//        'address'   => 'Pleven 16',
//           '_action'   => 'sell'                   
//        )                
//    );

    // display_item_collection($catArtefactCollection);
    $filterCategory = 'all';
    if(isset($_POST['filter_category'])) {
        $filterCategory = $_POST['filter_category'];
    }

    display_item_collection_filter($catArtefactCollection, $filterCategory);
?>
        
<?php include './ui/web-footer.php'; ?>