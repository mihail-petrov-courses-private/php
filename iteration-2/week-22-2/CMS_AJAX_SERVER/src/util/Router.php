<?php

class Router {
    
    private static $placeholderCollection = array();
    
    private static $isAuthenticatble      = false; 
    
    
    /**
     * 
     * @param type $requestUrlPathInformation
     * @return type
     */
    public static function bootstrap() {

        $requestUrlPathInformation      = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : '/';
        $requestMethod                  = $_SERVER['REQUEST_METHOD'];
        $requestActionFileCollection    = explode("/", $requestUrlPathInformation);
        
        array_shift($requestActionFileCollection);
        array_shift($requestActionFileCollection);

        $requestAction      = $requestActionFileCollection[0];
        $requestActionFile  = Router::processRequestActionMapping($requestAction); // category

        include './src/api/' . $requestActionFile . '.php';
                
        $functionExecutor = Router::processRequestURIFunctionMapping($requestActionFileCollection, $requestMethod);
                
        if(is_null($functionExecutor)) {
            return Response::notFound(array('message' => 'No mapping found'));
        }
        
        $isUserRequestNotAuthenticated = self::$isAuthenticatble && 
                                         self::isForbidden();
        
        if($isUserRequestNotAuthenticated) {
            return Response::forbidden();
        }
        
        call_user_func_array($functionExecutor, Router::getPlaceholderValueCollection());
    }    
    
    /**
     * 
     * @param type $placeholder
     * @return type
     */
    private static function isOptionalPlaceholder($placeholder) {
        return Router::isPlaceholder($placeholder, '{', '}');
    }

    /**
     * 
     * @param type $placeholder
     * @return type
     */
    private static function isRequiredPlaceholder($placeholder) {
        return Router::isPlaceholder($placeholder, '[', ']');
    }
    
    /**
     * 
     * @param type $placeholderValue
     */
    private static function pushPlaceholderValue($placeholderValue) {
        array_push(Router::$placeholderCollection, $placeholderValue);
    }
    
    /**
     * 
     * @return type
     */
    private static function getPlaceholderValueCollection() {
        return Router::$placeholderCollection;
    }

    /**
     * 
     * @param type $placeholder
     * @param type $leftTerminal
     * @param type $rightTerminal
     * @return type
     */
    private static function isPlaceholder($placeholder, $leftTerminal, $rightTerminal) {

        $placeholderLength = strlen($placeholder);
        $startPosition  = strpos($placeholder, $leftTerminal);
        $endPosition    = strpos($placeholder, $rightTerminal);

        return (($startPosition == 0) &&
               ($endPosition    == ($placeholderLength - 1)));
    }
    
    /**
     * 
     * @param type $requestActionFileCollection
     * @return type
     */
    private static function processRequestURIFunctionMapping($requestEndpoint, $requestMethod) {
        
        $requestEndpointMapping = getRequestEndpointMapping();
        
        foreach ($requestEndpointMapping as $endpointConfigurationCollection) {
            
            $endpoint   = explode('/', $endpointConfigurationCollection['endpoint']);
            $method     = $endpointConfigurationCollection['method'];
            $execute    = $endpointConfigurationCollection['execute'];
            
            $isValid    = Router::validateEndpointCollectionCount($endpoint, $requestEndpoint)    && 
                          Router::validateEndpointCollectionElement($endpoint, $requestEndpoint)  &&
                          Router::validateEndpointCollectionMethod($method, $requestMethod);
            
            if($isValid) {
                
                self::$isAuthenticatble = self::isAuthenticatble($endpointConfigurationCollection);
                return $execute;
            }
        }
        
        return null;
    }
    
    
    private static function isAuthenticatble($endpointConfigurationCollection) {
        return isset($endpointConfigurationCollection['auth']) ? $endpointConfigurationCollection['auth'] : false;
    }
    
    /**
     * 
     * @param type $requestActionFileCollection
     * @return type
     */
    private static function isForbidden() {
        return !Auth::isTokkenAvailable(Request::authTokken());
    }    
    
    /**
     * 
     * @param type $endpointCollection
     * @param type $requestEndpointCollection
     * @return boolean
     */
    private static function validateEndpointCollectionCount($endpointCollection, $requestEndpointCollection) {
        return count($endpointCollection) == count($requestEndpointCollection);
    }
    
    /**
     * 
     * @param type $endpointMethod
     * @param type $requestMethod
     * @return boolean
     */
    private static function validateEndpointCollectionMethod($endpointMethod, $requestMethod) {
        return $endpointMethod == $requestMethod;
    }

    /**
     * 
     * @param type $endpointCollection
     * @param type $requestEndpointCollection
     * @return boolean
     */
    private static function validateEndpointCollectionElement($endpointCollection, $requestEndpointCollection) {
                
        for($i= 0; $i < count($endpointCollection); $i++) {
             
            $endpointElement =  $endpointCollection[$i];
            $requestElement  =  $requestEndpointCollection[$i];

            if(Router::isOptionalPlaceholder($endpointElement)) {
                Router::pushPlaceholderValue($requestElement);
            }
            else if($endpointElement != $requestElement) {
                return false;                
            }
        }

        return true;
    }
    
    /**
     * 
     * @param type $requestAction
     * @return type
     */
    private static function processRequestActionMapping($requestAction) {

        $requestActionMapping = getRequestActionMapping();
        return (array_key_exists($requestAction, $requestActionMapping))  ? $requestActionMapping[$requestAction]  : $requestAction;        
    }
}