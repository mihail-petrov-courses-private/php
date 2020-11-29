<?php

// Very mportant problem
// include './session.php';
include './utils/session.php';

function set_user_nickname($nickname) {
    set_session_key('visitor_user_nick_name', $nickname);
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