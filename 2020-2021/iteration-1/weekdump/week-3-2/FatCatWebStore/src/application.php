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


function update_cart($catObject) {
    
    if(isset($_SESSION['cart'])) {
        return array_push($_SESSION['cart'], $catObject);
    }
    
    $_SESSION['cart']   = [];
    array_push($_SESSION['cart'], $catObject);
}

function get_cart() {
    return $_SESSION['cart'];
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

function filter($searchCollection, $searchCategory, $searchValue, $searchBuySell) {
    
    $isSearchValueEmpty     = (strlen($searchValue) == 0 );
    $isBuySellEmptry        = is_null($searchBuySell);
    $isCollectionAvailable  = $isSearchValueEmpty && $isBuySellEmptry;
    
    if($isCollectionAvailable) {
        return $searchCollection;
    }

    // 1. Create new array
    $catObjectCollection = [];

    // 2. Loop over original $catObjectMainCollection
    for($i = 0; $i < count($searchCollection); $i++) {

        $currentFilterableArray = $searchCollection[$i];
        $isSearchable           = ($currentFilterableArray[$searchCategory] == $searchValue);
        $isTransactionable      = $currentFilterableArray[$searchBuySell]   == true;
        $isProcesable           = $isSearchable || $isTransactionable;

        if($isProcesable) {
            array_push($catObjectCollection, $currentFilterableArray);
        }
    }
    
    return $catObjectCollection;
}



function redirect($location) {
    header("Location: $location");
}