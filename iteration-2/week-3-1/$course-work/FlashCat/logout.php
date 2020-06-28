<?php

include './util/init.php';

session_destroy();

//
//header('Location: index.php');

redirectTo("index.php");