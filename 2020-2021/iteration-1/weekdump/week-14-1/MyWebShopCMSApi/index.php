<?php

include './src/vendor/util/utils.php';
include basecontext('src/client/route/paths.php'          );
include basecontext('src/client/route/guards.php'         ); 
include basecontext('src/vendor/loader/Loader.php'        );        

spl_autoload_register(function($class) {
    include basecontext($class . '.php');
});

Loader::loadController();