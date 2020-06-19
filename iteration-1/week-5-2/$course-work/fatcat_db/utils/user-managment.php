<?php

// Very mportant problem
include './utils/session.php';

function set_user_nickname($nickname) {
    set_session_key('visitor_user_nick_name', $nickname);
}

function is_user_already_loged_in() {
    
    // Short logic expressing
    return !empty(get_session_key('user_info'));
}

function get_user_nickname() {
        
    if(empty(get_session_key('user_info'))) {
        return 'visitor';
    }
    
    return get_session_key('user_info')['fname'] . ' ' . get_session_key('user_info')['lname'];
}


function display_nickname() {
    echo "Hi " . get_user_nickname(); 
}