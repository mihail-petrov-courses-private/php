<?php

class Loader {
    
    private static $viewMapping = array(
        
        'home'             => array(
            'controller'   => (FRONT_CONTROLLER_LOCATION . "HomeController"),
            'method'       => 'index'
        ),
        
        // TODO map to HTTP POST / GET methods
        'signin'           => array(
            'controller'   => (FRONT_CONTROLLER_LOCATION . 'SignInController'),
            'guard_rules'  => ['redirectIfAuthenticated'],
            'methodRequestMapping' => [
                'POST'          => 'signin'
            ]
        ),
        
        'signup'           => array(
            'controller'   => (FRONT_CONTROLLER_LOCATION . 'SignUpController'),
            'methodRequestMapping' => [
                'POST'          => 'signup'
            ]
        ),
        'logout'           => array(
            'controller'   => (FRONT_CONTROLLER_LOCATION . 'LogoutController'),
            'method'        => 'logout'
        ),
        
        'teller'           => array(
            'controller'   => (FRONT_CONTROLLER_LOCATION . 'TellerController'),
            'method'       => 'index'
        ),
  
        'teller/mark'      => array(
            'controller'   => (FRONT_CONTROLLER_LOCATION . 'TellerController'),
            'methodRequestMapping' => [
                'POST'          => 'markProductForBuy'
            ]
        ),        
        
        'product'           => array(
            'controller'    => (ADMIN_CONTROLLER_LOCATION . 'ProductController'),
            'methodRequestMapping' => [
                'GET'           => 'index',
                'POST'          => 'createProduct',
                'PUT'           => 'updateProduct',
                'DELETE'        => 'deleteProduct'
            ]            
        ),
        
        /*
        'product/create'    => array(
            'controller'    => (ADMIN_CONTROLLER_LOCATION . 'ProductController'),
            'method'        => 'createProduct'
            //,
            //'guard_rules'   => ['adminOnly']
        ),
        
        'product/update'    => array(
            'controller'    => (ADMIN_CONTROLLER_LOCATION . 'ProductController'),
            'method'        => 'updateProduct'
            //,
            //'guard_rules'   => ['adminOnly']
        ),
        
        'product/delete'    => array(
            'controller'    => (ADMIN_CONTROLLER_LOCATION . 'ProductController'),
            'method'        => 'deleteProduct'
            //,
            //'guard_rules'   => ['adminOnly']
        ),        
        
        'create_category'    => array(
            'controller'    => (ADMIN_CONTROLLER_LOCATION . 'CategoryController'),
            'method'        => 'index'
            //,
            //'guard_rules'   => ['adminOnly']            
        )
         */
    );

    private static $viewMapping404 = array(
        'page_not_found'    => array(
            'controller' => (SYSTEM_CONTROLLER_LOCATION . 'Page404Controller.php')
        )
    );
    
    private static $DEFAULT_CONTROLLER = 'home';
    
    private static function isGuarded($controller) {
        
        if(!array_key_exists('guard_rules', self::getControllerConfig($controller))) {
            return false;
        }
        
        $guardCollection = self::getControllerConfig($controller)['guard_rules'];
        
        foreach ($guardCollection as $guardRule) {
            if($guardRule()) return true;
        }
        
        return false;
    }
    
    private static function getControllerIndex() {

        if(!array_key_exists('PATH_INFO', $_SERVER)) {
            return self::$DEFAULT_CONTROLLER;
        }
        
        $pageIndexCollection = explode('/', $_SERVER['PATH_INFO']);        
        array_shift($pageIndexCollection);
        
        // return $pageIndexCollection[0];
        return implode('/', $pageIndexCollection);
    }
    
    private static function getControllerConfig($controller) {

        if(array_key_exists($controller, self::$viewMapping)) {
            return self::$viewMapping[$controller];
        }

        return self::$viewMapping404['page_not_found'];
    }        
    
    public static function loadController() {
     
        $controller    = Loader::getControllerIndex();
        $controllerClass        = self::getControllerConfig($controller)['controller'];
        $controllerMethod       = null;
        
        if(array_key_exists('method', self::getControllerConfig($controller))) {
            $controllerMethod   = self::getControllerConfig($controller)['method']; 
        }
        
        if(array_key_exists('methodRequestMapping', self::getControllerConfig($controller))) {
            
            $methodRequestMapping   = self::getControllerConfig($controller)['methodRequestMapping'];
            $requestMethod          = $_SERVER['REQUEST_METHOD'];
            $controllerMethod       = $methodRequestMapping[$requestMethod];
        }
        
        if(Loader::isGuarded($controller)) {
            redirect('home');
        }
        
        (new $controllerClass())->{$controllerMethod}();
    }
}