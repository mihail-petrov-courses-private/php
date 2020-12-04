<?php

// CamilCase

$isUserLogedIn                  = false; 
$webApplicationVisitorUsername  = "";

// var_dump($_GET);
// var_dump(isset($_GET['username']));
if(isset($_GET['username'])) {
    $webApplicationVisitorUsername = $_GET['username'];
}

// var_dump($_GET);
// var_dump(isset($_GET['username']));
if(isset($_POST['username'])) {
    $webApplicationVisitorUsername = $_POST['username'];
}

// snake case
function application_slogan($webApplicationTitle) {
    echo "<strong> $webApplicationTitle <strong>";    
}

function greet_visitor($visitorUsername) {
    
    $visitorGreatingMessageIndex = rand(1, 10);
    
    $shouldGreatingBePlesant    =   $visitorGreatingMessageIndex > 1 && 
                                    $visitorGreatingMessageIndex < 5;
    
    $shouldGreatingBeRude       =   $visitorGreatingMessageIndex > 6 && 
                                    $visitorGreatingMessageIndex < 8;
    
    $shouldGreatingBeUsual      =   $visitorGreatingMessageIndex == 9 || 
                                    $visitorGreatingMessageIndex == 10;
    
    // && -> AND
    // || -> OR
    // !  => NOT
    
    if($shouldGreatingBePlesant) {
        echo "<span>Как я караш $visitorUsername</span>";
    }
    
    if($shouldGreatingBeRude) {
        echo "<span>Много си голям $visitorUsername</span>";
    }
    
    if($shouldGreatingBeUsual) {
        echo "<span>Машина си $visitorUsername</span>";
    }
}


function slogan($visitorUsername) {
    
    $webApplicationTitle                    = "Fat Cat Web Store";
    application_slogan($webApplicationTitle);
    greet_visitor($visitorUsername);
}

function main_menu($isUserLogedIn) {

    echo '<ul>';
        if($isUserLogedIn) :
            echo "<li class='list--item'><a href='index.php'>Home</a></li>";
            echo "<li class='list--item'><a href='store.php'>Store</a></li>";
        else:
            echo "<li class='list--item'><a href='index.php'>Home</a></li>";
            echo "<li class='list--item'><a href='signin.php'>Sign in</a></li>";
            echo "<li class='list--item'><a href='signup.php'>Sign up</a></li>";
        endif;
    echo '</ul>';   
}