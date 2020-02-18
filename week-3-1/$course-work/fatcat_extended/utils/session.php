<?php

function set_session_key($key, $value) {
    $_SESSION[$key] = $value;
}

function get_session_key($key) {
    
    if(isset($_SESSION[$key])) {
        return $_SESSION[$key];
    }
    
    return "";
}


// CamelCase
//function setSessionKey() {
//    
//}
//
//function SetSessionKey() {
//    
//}
//
