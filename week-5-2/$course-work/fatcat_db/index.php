<?php include './ui/login-header.php'; ?>

<?php      
   
    if(isset($_POST['registration_tokken']) AND $_POST['registration_tokken'] == '1') {

        // How to connect to DB ? 
        // mysql_connect 
        // incorect connection try
        // $mysqlConnection = mysqli_connect("localhost", "root", "password", "fatcat");
        
        
        // Refactoring
        $mysqlConnection = mysqli_connect("localhost", "root", "", "fatcat");
        
        if(mysqli_connect_errno()) {
            
            echo "<strong>Failed to connect</strong>";
            echo "<br>";
            echo mysqli_connect_error();
            echo "<br>";
            echo mysqli_connect_errno();
            exit();
        }
        
        $isFormValid    = true;
        $fname          = $_POST['fname'];
        if(strlen($fname) < 5) {
            echo "Error : fname must be greater than 5 chars";
            echo '<br>';
            $isFormValid = false;
        }
        
        $lname      = $_POST['lname'];
        if(strlen($lname) < 5) {
            echo "<strong>Error : lname must be greater than 5 chars<strong>";
            echo '<br>';
            $isFormValid = false;
        }        
        
        $email      = $_POST['email'];
        if(!isset($email)) {
            echo "Error : E-mail is required";
            echo '<br>';
            $isFormValid = false;
        }                
        
        $address    = $_POST['address'];
        $mobile     = $_POST['mobile'];
        $password   = $_POST['password'];
        
        if($isFormValid) {
            
            $query = "INSERT INTO fatcat.users(fname, lname, email, address, mobile, password)
                      VALUES('$fname', '$lname', '$email', '$address', '$mobile', '$password');";
            
            if(!db_query($query)) {
                echo 'Query failed';
            }
            else {
                
                $lastInsertedId = mysqli_insert_id($mysqlConnection);
                //$lastInsertedId     = db_get_last_inserted_id();
                $selectQuery        = "SELECT * FROM users WHERE id = $lastInsertedId";
                //$resultCollection   = db_query($selectQuery);
                // var_dump($resultCollection);
                
                
                // Not yet
                // var_dump($resultCollection);
                 $resultCollection = mysqli_query($mysqlConnection, $selectQuery);
                 $queryResourcePointer   = mysqli_query($mysqlConnection, $selectQuery);
                 $resultCollection       = mysqli_fetch_assoc($queryResourcePointer);
                 mysqli_close($mysqlConnection);
                 $_SESSION['user_info'] = $resultCollection;
                  redirect('dashboard.php');
                
                // echo "Success registration";
            }
            
//            
            
//            $resultInsert = mysqli_query($mysqlConnection, $query);
//            echo '**';
//            var_dump($resultInsert);
//            echo '**';
            
            
//            if(!mysqli_query($mysqlConnection, $query)) {
//
//                echo 'Query failed';
//                echo mysqli_error($mysqlConnection);
//            }
//            else {
//                
//                $lastInsertedId = mysqli_insert_id($mysqlConnection);
//                $selectQuery = "SELECT * FROM users WHERE id = $lastInsertedId";
//                // Not yet
//                // var_dump($resultCollection);
//                // $resultCollection = mysqli_query($mysqlConnection, $selectQuery);
//                $queryResourcePointer   = mysqli_query($mysqlConnection, $selectQuery);
//                $resultCollection       = mysqli_fetch_assoc($queryResourcePointer);
//                mysqli_close($mysqlConnection);
//                $_SESSION['user_info'] = $resultCollection;
//                // redirect('dashboard.php');
//                
//                // echo "Success registration";
//            }
        }
        else {
            echo '<br>';
            echo "This form is invalid"; 
            echo '<br>';
        }
    }
?>
        
<!-- HTTP -->
<!-- GET   : visible   -->
<!-- POST  : invisible -->
<div class="section">
    <h3> Fat Cat : Market </h3>        
<form method="POST" id="registration_form">
    <input type="text" name="fname" placeholder="First name"/>
    <input type="text" name="lname" placeholder="Last name"/>
    <input type="text" name="email" placeholder="E-mail"/>
    <input type="text" name="address" placeholder="Address"/>
    <input type="text" name="mobile" placeholder="Mobile phone"/>
    <input type="text" name="password" placeholder="Password"/>
    
    <input type="hidden" name="registration_tokken" value="1"/>
    <input type="submit" value="Register">
</form>
</div>
        
<?php include './ui/login-footer.php' ?>