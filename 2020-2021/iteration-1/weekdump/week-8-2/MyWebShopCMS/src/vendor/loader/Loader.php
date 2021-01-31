<?php

class Loader {
    
    private static $viewMapping = array(
        'home'      => array(
            'view'          => 'view/front/home.php',
            'controller'    => (FRONT_CONTROLLER_LOCATION . "HomeController.php")
        ),
        'signin'            => array(
            'view'          => 'view/front/signin.php',
            'controller'    => (FRONT_CONTROLLER_LOCATION . 'SignInController.php'),
            'guard_rules'   => ['redirectIfAuthenticated']
        ),
        'signup'            => array(
            'view'          => 'view/front/signup.php',
            'controller'    => (FRONT_CONTROLLER_LOCATION . 'SignUpController.php')
        ),
        'logout'            => array(
            'view'          => NULL,
            'controller'    => (FRONT_CONTROLLER_LOCATION . 'LogoutController.php')
        ),
        
        'create_product'    => array(
            'view'          => 'view/admin/product.php',
            'controller'    => (ADMIN_CONTROLLER_LOCATION . 'ProductController.php'),
            'guard_rules'   => ['adminOnly']
        ),
        
        'create_category'    => array(
            'view'          => 'view/admin/category.php',
            'controller'    => (ADMIN_CONTROLLER_LOCATION . 'CategoryController.php'),
            'guard_rules'   => ['adminOnly']            
        )
    );

    private static $viewMapping404 = array(
        'page_not_found'    => array(
            'view'  => 'view/layout/page_404.php',
            'controller' => (SYSTEM_CONTROLLER_LOCATION . 'Page404Controller.php')
        )
    );
    
    private static $DEFAULT_CONTROLLER = 'home';
    
    public static function isGuarded($controller) {
        
        if(!array_key_exists('guard_rules', self::getControllerConfig($controller))) {
            return false;
        }
        
        $guardCollection = self::getControllerConfig($controller)['guard_rules'];
        
        foreach ($guardCollection as $guardRule) {
            if($guardRule()) return true;
        }
        
        return false;
    }

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