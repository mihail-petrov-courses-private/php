<?php

class Loader {
    
    private static $viewMapping = array(
        'home'      => array(
            'view'          => 'view/front/home.php',
            'controller'    => 'src/controllers/front/HomeController.php'
        ),
        'signin'            => array(
            'view'          => 'view/front/signin.php',
            'controller'    => 'src/controllers/front/SignInController.php'
        )
    );

    private static $viewMapping404 = array(
        'page_not_found'    => array(
            'view'  => 'view/layout/page_404.php',
            'controller' => 'src/controllers/system/Page404Controller.php'
        )
    );
    
    private static $DEFAULT_CONTROLLER = 'home';
    
    public static function getView($controller) {
        return self::getControllerConfig($controller)['view'];
    }
    
    public static function getController($controller) {
        return self::getControllerConfig($controller)['controller'];
    }    

    public static function getControllerIndex() {

        if(!array_key_exists('PATH_INFO', $_SERVER)) {
            return self::$DEFAULT_CONTROLLER;
        }

        $pageIndexCollection = explode('/', $_SERVER['PATH_INFO']);
        array_shift($pageIndexCollection);

        return $pageIndexCollection[0];
    }
    
    private static function getControllerConfig($controller) {

        if(array_key_exists($controller, self::$viewMapping)) {
            return self::$viewMapping[$controller];
        }

        return self::$viewMapping404['page_not_found'];
    }        
}