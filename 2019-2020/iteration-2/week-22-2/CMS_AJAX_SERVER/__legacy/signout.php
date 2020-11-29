<?php session_start(); ?>
<?php include './src/models/Auth.php';      ?>
<?php include './src/util/redirect.php';    ?>

<?php
Auth::signout();
redirectTo("signin");