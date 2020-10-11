<?php include('./templates/user/header.php'); ?>
<?php include('./src/controllers/signup.php') ?>

<div id="signup--wrapper">
    <form method="POST">

        <input placeholder  = "User name" 
               class        = "input"  
               type         = "text"      
               name         = "user_name">
        <?php displayFormError('signup', 'user_name'); ?>
        
        <input placeholder  ="User first name" 
               class        ="input"  
               type         ="text"      
               name         ="user_fname">
        <?php displayFormError('signup', 'user_fname'); ?>
        
        <input placeholder  = "User last name" 
               class        = "input"  
               type         = "text"      
               name         = "user_lname">
        <?php displayFormError('signup', 'user_lname'); ?>
        
        <input placeholder  = "User E-mail address" 
               class        = "input"  
               type         = "email"      
               name         = "user_email">
        <?php displayFormError('signup', 'user_email'); ?>
        
        <input placeholder  = "Password" 
               class        = "input"  
               type         = "password"  
               name         = "user_pass">
        <?php displayFormError('signup', 'user_pass'); ?>
        
        <input placeholder  = "Repeat password" 
               class        = "input"  
               type         = "password"  
               name         = "user_pass_repeat">
        <input type         = "hidden"  
               name         = "user_request_tokken"
               value        = "1">
        <input class="submit" type="submit">
    </form>
</div>


<?php include('./templates/user/footer.php'); ?>