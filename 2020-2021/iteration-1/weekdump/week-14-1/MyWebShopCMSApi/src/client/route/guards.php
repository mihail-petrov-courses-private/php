<?php

function redirectIfAuthenticated() {
    return User::isAuthenticated();
}

function preventSeubmitBeforeTokkenValidation() {
    
}

function adminOnly() {
    return !User::hasRoleAdmin();
}