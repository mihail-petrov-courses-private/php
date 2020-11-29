<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            
            .error {
                color : #ff0000;
                font-size: 14px;
            }
            
        </style>
    </head>
    <body>
        <?php
          // if user_name is available  
            // $username = 'Mihail';
            // $usernameCollection = array('Mihail', 10, array("A", "B"));
            // $usernameCollection = ['Mihail', 'Nencho', 'Katericata'];
            
            // var_dump($usernameCollection);
            // echo $usernameCollection[0];
            //print_r($usernameCollection);
            
            // var_dump($_POST);    
            
        
//  isset with variables
//  =============================================
//        $username = 'mihail';
//        echo $username;
//        
//        if(isset($username)) {
//            echo 'Username is define';
//        }
//        
            if(isset($_POST['welcome_form_tokken']) AND $_POST['welcome_form_tokken'] == '1') {
            
                $username               = $_POST['user_name'];
                $isUsernameAvailable    = !empty($username);
                
                if($isUsernameAvailable) {
                    
//                    $systemMessage          = ($isUsernameAvailable) ? 
//                                         "<h2>Hi $username </h2>" : 
//                                         "<div class='error'>Pleace enter username info</div>";
                    // echo $systemMessage;
                    header('Location: dashboard.php');                    
                }
                else {
                    echo "<div class='error'>Pleace enter username info</div>";
                }
            }
       
        ?>
        
        <!-- HTTP -->
        <!-- GET   : visible   -->
        <!-- POST  : invisible -->
        <form method="POST" action="form_validation.php">
            <input type="text" name="user_name" placeholder="Nickname"/>
            <input type="hidden" name="welcome_form_tokken" value="1"/>
            <input type="submit" value="Say my name">
        </form>
        
    </body>
</html>
