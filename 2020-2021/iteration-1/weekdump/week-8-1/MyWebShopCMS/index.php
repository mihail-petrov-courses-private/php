<?php

include './src/util/utils.php';
include basecontext('src/database/Database.php'    );     
include basecontext('src/validation/Validator.php' );  
include basecontext('src/message/Message.php'      );       
include basecontext('src/user/User.php'            );         
include basecontext('src/loader/Loader.php'        );         

$controllerIndex = Loader::getControllerIndex();
$viewPath        = Loader::getView($controllerIndex);
$controllerPath  = Loader::getController($controllerIndex);

include basecontext('view/layout/header.php');
include basecontext($controllerPath);
include basecontext($viewPath);
include basecontext('view/layout/footer.php');