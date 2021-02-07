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


if(Loader::isGuarded($controllerIndex)) {
    redirect('home');
}

include basecontext('view/layout/header.php');
include basecontext($controllerPath);

if(!is_null($viewPath)) {
    include basecontext($viewPath);
}

include basecontext('view/layout/footer.php');


class DynamicUser {
    
    private $fname;
    private $lname;

    public function __construct($fname, $lname) {
        $this->fname = $fname;
        $this->lname = $lname;
    }
    
    public function sayMyName() {
        echo $this->fname . ' ' . $this->lname;
    }
}

class StaticUser {
    
    public static function sayMyName($fname, $lname) {
        echo $fname . ' ' . $lname;
    }
    
}

echo '<br>';
$dynamic = new DynamicUser("Mihail", "Petrov");
$dynamic->sayMyName();

echo '<br>';
$dynamic = new DynamicUser("Todor", "Angelov");
$dynamic->sayMyName();

echo '<br>';

StaticUser::sayMyName("Gosho", "Toshov");
