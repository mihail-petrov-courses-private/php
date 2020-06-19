<?php
session_start();

function isUserLogedIn() {
    return isset($_SESSION['full_name']);
}

function isUserNotLogedIn() {
    return !isUserLogedIn();
}

function redirect_to($page) {
    header("Location: $page");
}