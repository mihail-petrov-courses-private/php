<?php
session_start();

// CamilCase
// $isUserLogedIn                  = false; 
// $webApplicationVisitorUsername  = "";

// var_dump($_GET);
// var_dump(isset($_GET['username']));
//if(isset($_GET['username'])) {
//    $webApplicationVisitorUsername = $_GET['username'];
//}

// var_dump($_GET);
// var_dump(isset($_GET['username']));
if(isset($_POST['username'])) {
    // $webApplicationVisitorUsername  = $_POST['username'];
   // $isUserLogedIn                  = true;
    //$_SESSION['user_name']          = $webApplicationVisitorUsername;
    $_SESSION['user_name']          = $_POST['username'];
    //$_SESSION['is_user_loged_in']   = $isUserLogedIn;
    $_SESSION['is_user_loged_in']   = true;
}

function is_user_loged_in() {
    
    if(isset($_SESSION['is_user_loged_in'])) {
        return $_SESSION['is_user_loged_in'];
    }
    
    return false;
}

function get_username() {
    
    if(isset($_SESSION['user_name'])) {
        return $_SESSION['user_name'];
    }
    
    return "";
}


// snake case
function application_slogan($webApplicationTitle) {
    echo "<strong class='logo'> $webApplicationTitle </strong>";    
}

function greet_visitor($visitorUsername) {
    
    $visitorGreatingMessageIndex = rand(1, 10);
    
//    $shouldGreatingBePlesant    =   $visitorGreatingMessageIndex >= 1 && 
//                                    $visitorGreatingMessageIndex <= 5;
//    
//    $shouldGreatingBeRude       =   $visitorGreatingMessageIndex >= 6 && 
//                                    $visitorGreatingMessageIndex <= 8;
    
    $shouldGreatingBePlesant    =   $visitorGreatingMessageIndex > 1 && 
                                    $visitorGreatingMessageIndex < 5;
    
    $shouldGreatingBeRude       =   $visitorGreatingMessageIndex > 6 && 
                                    $visitorGreatingMessageIndex < 8;    
    
    $shouldGreatingBeUsual      =   $visitorGreatingMessageIndex == 9 || 
                                    $visitorGreatingMessageIndex == 10;
    
    // && -> AND
    // || -> OR
    // !  => NOT
    
    if($visitorUsername) {
        
//        var_dump($visitorGreatingMessageIndex);
//        var_dump($shouldGreatingBePlesant);
//        var_dump($shouldGreatingBeRude);
//        var_dump($shouldGreatingBeUsual);
        
        if($shouldGreatingBePlesant) {
            echo "<span>Как я караш $visitorUsername</span>";
        }
        else if($shouldGreatingBeRude) {
            echo "<span>Много си голям $visitorUsername</span>";
        }
        else if($shouldGreatingBeUsual) {
            echo "<span>Машина си $visitorUsername</span>";
        }
        else {
            echo "<span>Здрасти $visitorUsername</span>";
        }
    }
    else {
        echo "<span>Здрасти Гостенино</span>";
    }
}

function greet_visitor_greeting() {
    
    $visitorGreatingMessageIndex = rand(1, 10);
        
    $shouldGreatingBePlesant    =   $visitorGreatingMessageIndex > 1 && 
                                    $visitorGreatingMessageIndex < 5;
    
    $shouldGreatingBeRude       =   $visitorGreatingMessageIndex > 6 && 
                                    $visitorGreatingMessageIndex < 8;    
    
    $shouldGreatingBeUsual      =   $visitorGreatingMessageIndex == 9 || 
                                    $visitorGreatingMessageIndex == 10;
    
    $visitorUsername            = get_username();
    
    if(!$visitorUsername) {
        return "<span>Здрасти Гостенино</span>";
    }
    
    if($shouldGreatingBePlesant) {
        return "<span>Как я караш $visitorUsername</span>";
    }

    if($shouldGreatingBeRude) {
        return "<span>Много си голям $visitorUsername</span>";
    }
    
    if($shouldGreatingBeUsual) {
        return "<span>Машина си $visitorUsername</span>";
    }    
    
    return "<span>Здрасти $visitorUsername</span>";
}

function slogan() {
    
    $webApplicationTitle                    = "Fat Cat Web Store";
    application_slogan($webApplicationTitle);
    // greet_visitor($visitorUsername);
    // $returnedValueVariable = greet_visitor_greeting($visitorUsername);
    echo greet_visitor_greeting(); // 
}

function main_menu() {

    echo '<ul>';
        if(is_user_loged_in()) :
            echo "<li class='list--item'><a href='index.php'>Home</a></li>";
            echo "<li class='list--item'><a href='store.php'>Store</a></li>";
            echo "<li class='list--item'><a href='logout.php'>Logout</a></li>";
        else:
            echo "<li class='list--item'><a href='index.php'>Home</a></li>";
            echo "<li class='list--item'><a href='signin.php'>Sign in</a></li>";
            echo "<li class='list--item'><a href='signup.php'>Sign up</a></li>";
        endif;
    echo '</ul>';   
}



function redirect($location) {
    header("Location: $location");
}