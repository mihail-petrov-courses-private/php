<?php

function url($url) {
    
    $host = $_SERVER['HTTP_HOST'];
    $path    = $_SERVER['SCRIPT_NAME'];
    return "http://$host$path/$url";
}

function renderInitilContent() {
    echo "HOME";
}

function bootstrapSellForm() {
    echo "<form><input type='text'</form>";
}


function pageNotFound() {
    echo "404 Page not found";
}


function goBackHref() {
    //echo "<a href='" . url('home/index') . "'>Go Back</a>";
    echo "<a href='/home/index'>Go Back</a>";
}