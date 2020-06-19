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

    $filterCategory = 'all';
    if(isset($_POST['filter_category'])) {
        $filterCategory = $_POST['filter_category'];
    }

    display_item_collection_filter($catArtefactCollection, $filterCategory);
?>
        
<?php include './ui/web-footer.php'; ?>