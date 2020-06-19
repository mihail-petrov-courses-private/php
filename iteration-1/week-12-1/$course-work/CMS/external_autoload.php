<?php

session_start();

function redirect($address) {
    header("Location: $address.php");
}

spl_autoload_register(function($element) {

    // 1. explode
    // str_replace
    $collection = explode('\\', $element);

    $newPath = ".";

    foreach($collection as $value) {
        $newPath = $newPath . '/' . $value;
    }

    $newPath = $newPath . '.php';

    include $newPath;
});