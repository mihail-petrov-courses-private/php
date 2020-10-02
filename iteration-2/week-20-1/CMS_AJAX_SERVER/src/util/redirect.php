<?php

function redirectTo($pageName) {
    return header('Location: ' . $pageName . '.php');
}