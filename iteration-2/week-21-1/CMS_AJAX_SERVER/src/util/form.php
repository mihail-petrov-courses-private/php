<?php

function setFormError($group, $key, $message) {
    $_SESSION[$group][$key] = $message;
}

function returnFormError($group, $key) {
    
    if(isset($_SESSION[$group][$key])) {
        return  $_SESSION[$group][$key];
    }
}

function displayFormError($group, $key) {
    
    echo '<div class="form-error">';
    echo returnFormError($group, $key);
    echo '<div>';
    $_SESSION[$group][$key] = NULL;
}