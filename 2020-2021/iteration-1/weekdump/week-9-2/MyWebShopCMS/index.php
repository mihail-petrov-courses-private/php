<?php

include './src/vendor/util/utils.php';
include basecontext('src/client/route/paths.php'               );

include basecontext('src/vendor/database/Database.php'         );     
include basecontext('src/vendor/validation/Validator.php'      );  
include basecontext('src/vendor/message/Message.php'           );       
include basecontext('src/vendor/user/User.php'                 );         
include basecontext('src/vendor/loader/Loader.php'             );        

include basecontext('src/client/components/dropdown.php'        );        
include basecontext('src/client/route/guards.php'               );        

$controllerIndex = Loader::getControllerIndex();
$viewPath        = Loader::getView($controllerIndex);
$controllerPath  = Loader::getController($controllerIndex);
$modelCollection = Loader::getModelCollection($controllerIndex);

if(Loader::isGuarded($controllerIndex)) {
    redirect('home');
}

// * Load base view
include basecontext('view/layout/header.php');

// * Load model
foreach ($modelCollection as $modelClass) {
    include basecontext($modelClass);
}

// * Load Controller
include basecontext($controllerPath);

// * Load VIEW
if(!is_null($viewPath)) {
    include basecontext($viewPath);
}

// * Load base view
include basecontext('view/layout/footer.php');