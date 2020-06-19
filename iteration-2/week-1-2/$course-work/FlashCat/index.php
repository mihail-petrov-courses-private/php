<?php include './section/header.php'; ?>

<?php 
    var_dump($_SESSION);
?> 

<?php

    if(isUserNotLogedIn()) {
        echo '<form method="GET" action="price.php">
                <input type="text" name="fname">
                <input type="text" name="lname">
                <input type="submit">
            </form>';
    }
?>


<?php if(isUserNotLogedIn()) {?>

<form method="GET" action="price.php">
    <input type="text" name="fname">
    <input type="text" name="lname">
    <input type="submit">
</form>

<?php  }?>
            
<?php include './section/footer.php' ?>