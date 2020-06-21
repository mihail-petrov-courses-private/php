<?php include './section/header.php'; ?>

<?php 
    $userFullname   = isset($_GET['user_fullname']) ? $_GET['user_fullname'] : NULL;
    $userEmail      = isset($_GET['user_email'])    ? $_GET['user_email']    : NULL;

    if(validateIsUserHasCredentials($userFullname, $userEmail)) {
        
        signInUser($userFullname);
        redirectTo("index.php");
    }
?>

<?php if(isUserNotLogedIn()) { ?>

<form method="GET">
    <input type="text" name="user_fullname" placeholder="User fullname">
    <br/>
    <input type="text" name="user_email" placeholder="User E-mail">
    <br/>
    <input type="submit">
</form>

<?php  }?>
            
<?php include './section/footer.php' ?>