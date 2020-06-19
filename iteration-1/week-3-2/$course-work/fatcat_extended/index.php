<?php include './ui/login-header.php'; ?>

<?php      
    
    // Sugestion metadata for the server
    // var_dump($_SERVER);
   
    if(isset($_POST['welcome_form_tokken']) AND $_POST['welcome_form_tokken'] == '1') {

        $username               = $_POST['user_name'];
        $isUsernameAvailable    = !empty($username);

        set_user_nickname($username);

        if($isUsernameAvailable) {
            redirect("dashboard.php");
        }
        else {
            echo "<div class='error'>Pleace enter username info</div>";
        }
    }

    if(isset($_GET['legal_page_rules']) && $_GET['legal_page_rules'] == 1) {

        if($_GET['legal-group'] == 'legal') {
            redirect("legal\page-rule.php");
        }

        if($_GET['legal-group'] == 'advice') {
            redirect("legal\page-advice.php");
        }
    }
?>
        
<!-- HTTP -->
<!-- GET   : visible   -->
<!-- POST  : invisible -->
<div class="section">
    <h3> Welcome to this page </h3>        
<form method="POST">
    <input type="text" name="user_name" placeholder="Nickname"/>
    <input type="hidden" name="welcome_form_tokken" value="1"/>
    <input type="submit" value="Say my name">
</form>
</div>

<div class="section">
    <h3> Legal information </h3>

    <form method="GET">
        <label> Legal Advice</label>
        <input type="radio" value="advice" name="legal-group"/>
        <label> Legal rules</label>
        <input type="radio" value="legal" name="legal-group"/>
        <input type="hidden" name="legal_page_rules" value="1">
        <input type="submit" value="Read extra detail">
    </form>
</div>
        
<?php include './ui/login-footer.php' ?>