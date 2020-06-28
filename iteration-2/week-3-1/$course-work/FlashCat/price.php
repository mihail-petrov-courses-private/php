<?php include './section/header.php'; ?>

<?php

$extraService   = isset($_POST['extra_service']);
$premiumService = isset($_POST['premium_service']);
$ultraService   = isset($_POST['ultra_service']);
$totalPrice    = 5;


echo "<h2>Service List</h2>";

echo "<ul>";
echo "<li>base : 5</li>";
if($extraService) {
    
    $totalPrice = $totalPrice + 15;
    echo "<li>extra : 15</li>";
}

if($premiumService) {
    
    $totalPrice = $totalPrice + 25;
    echo "<li>premium : 25</li>";
}

if($ultraService) {
    
    $totalPrice = $totalPrice + 35;
    echo "<li>ultra : 35</li>";
}

echo "<li>total : $totalPrice</li>";
echo "</ul>";

?>

<form method="post">
    <input type="checkbox" name="extra_service" value="Y">
    Extra Service
    <br>
    <input type="checkbox" name="premium_service" value="Y">
    Premium Service
    <br>
    <input type="checkbox" name="ultra_service" value="Y">
    Ultra Service
    <br>
    <input type="submit">
</form>

<?php include './section/footer.php'; ?>