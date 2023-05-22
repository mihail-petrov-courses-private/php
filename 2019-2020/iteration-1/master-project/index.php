<?php include('./templates/user/header.php'); ?>

<h2>Welcome to Custom CMS</h2>

<?php 

    echo  Database::delete('tb_users', array('age' => '10'));

?>

<?php include('./templates/user/footer.php'); ?>