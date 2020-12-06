<?php
include './src/application.php';

// session remove
// $_SESSION['user_name']        = "";
// $_SESSION['is_user_loged_in'] = false;
session_destroy();

// Location: <url>
// header('Location: index.php');
redirect('index.php');