<?php

include './util/init.php';

session_destroy();

//
//header('Location: index.php');

redirect_to("index.php");