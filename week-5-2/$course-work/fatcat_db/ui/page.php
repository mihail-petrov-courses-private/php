<?php

// Not Nesesary 
function get_page_header() {
    
   $userNickname = get_user_nickname();
    echo "<header id='header'> <div>Fat Cat Market</div> <div>$userNickname</div></header>";
}

// Not Nesesary 
function get_page_footer() {
    echo "<footer id='footer'>Web Page footer</footer>";
}