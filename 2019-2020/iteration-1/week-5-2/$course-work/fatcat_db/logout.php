<?php include './ui/web-header.php' ?>

<?php 
    
    if(is_user_already_loged_in()) {
        
        session_destroy();
        redirect("index.php");
    }
    else {
        redirect("index.php");
    }
?>


<?php include './ui/web-footer.php' ?>