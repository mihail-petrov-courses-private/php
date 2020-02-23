<?php

// Very mportant problem
// include './session.php';
include './utils/session.php';

function set_user_nickname($nickname) {
    set_session_key('visitor_user_nick_name', $nickname);
}

function is_user_already_loged_in() {
    
    // Short logic expressing
    return !empty(get_session_key('visitor_user_nick_name'));
    
    // Long IF expressing 
    //    if(empty(get_session_key('visitor_user_nick_name'))) {
    //        return false;
    //    }
    //    
    //    return true;
}


function get_user_nickname() {
        
    if(empty(get_session_key('visitor_user_nick_name'))) {
        return 'visitor';
    }
    
    return get_session_key('visitor_user_nick_name');
}


function display_nickname() {
    echo "Hi " . get_user_nickname(); 
}