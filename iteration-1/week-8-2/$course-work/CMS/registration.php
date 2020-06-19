<?php     
include './external_autoload.php';

// NB : Dynamic method ??? 
(new controllers\RegistrationController())->index();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CMS</title>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/public.css">
    </head>
    <body>
        
        <div id="application-header" class="web-header">
            <h1 class="logo">Registration</h1>
        </div>
            
        <div class="wrapper">
            <form method="POST" name="registration">
                <input class="form-input" type="text" placeholder="Username" name="username">
                <input class="form-input" type="text" placeholder="E-mail" name="email">
                <input class="form-input" type="text" placeholder="Password" name="password">
                <input class="form-input" type="text" placeholder="Repeat Password" name="repeat-password">
                
                <input class="button" type="submit" name="post_submit">
                <input type="hidden" name="post_tokken" value="1">
            </form>
        </div>
        
    </body>
</html>