    <?php
    include './src/db/Database.php';
    include './src/util/Pagination.php';
    include './src/util/Response.php';
    include './config/routes.php';

    // #Now
    // http://localhost/CMS_AJAX_SERVER/category.php
    // http://localhost/CMS_AJAX_SERVER/blog_post.php

    // #Expectation
    // http://localhost/CMS_AJAX_SERVER/index.php/blog_post
    // http://localhost/CMS_AJAX_SERVER/index.php/category

    // #mod_rewrite
    // http://localhost/CMS_AJAX_SERVER/ <=> http://localhost/CMS_AJAX_SERVER/index.php/

    // #Result
    // http://localhost/CMS_AJAX_SERVER/blog_post
    // http://localhost/CMS_AJAX_SERVER/category

    // REST URL 
    // GET -> http://localhost/CMS_AJAX_SERVER/index.php/blog_post/10/category
    // http://localhost/CMS_AJAX_SERVER/index.php/category/10
    // http://localhost/CMS_AJAX_SERVER/index.php/category?limit=10&next=25

    // http://localhost/CMS_AJAX_SERVER/index.php?action=get_category_from_post&post_id=10
    // http://localhost/CMS_AJAX_SERVER/index.php?action=get_category_from_post&post_id=10&categorty_id=5

   
    function loadApiAction($requestUrlPathInformation) {

        // URI
        // http://localhost/CMS_AJAX_SERVER/blog_post
        // # GET
        // * blog_post              => get_blog_post_all()
        // * blog_post/10           => get_blog_post_single(10)
        // * blog_post/category/1   => get_blog_post_by_category(1)
        // 
        // 
        // http://localhost/CMS_AJAX_SERVER/category
        
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        
        $requestActionFileCollection = explode("/", $requestUrlPathInformation);
        array_shift($requestActionFileCollection);
        array_shift($requestActionFileCollection);

        $requestAction      = $requestActionFileCollection[0];
        $requestActionFile  = processRequestActionMapping($requestAction); // category

        include './api/' . $requestActionFile . '.php';

        $functionExecutor = processRequestURIFunctionMapping($requestActionFileCollection);
        echo "<hr>";
        echo $functionExecutor;
        // $functionExecutor();
    }
    
    /**
     * 
     * @param type $requestActionFileCollection
     * @return type
     */
    function processRequestURIFunctionMapping($requestEndpoint) {
        
        $requestEndpointMapping = getRequestEndpointMapping();
        
        foreach ($requestEndpointMapping as $endpointConfigurationCollection) {
            
            $endpoint   = explode('/', $endpointConfigurationCollection['endpoint']);
            $method     = $endpointConfigurationCollection['method'];
            $execute    = $endpointConfigurationCollection['execute'];
            
            $isValid    = validateEndpointCollectionCount($endpoint, $requestEndpoint) &&
                          validateEndpointCollectionElement($endpoint, $requestEndpoint);
            
            if($isValid) return $execute;
        }
    }
    
    /**
     * 
     * @param type $endpointCollection
     * @param type $requestEndpointCollection
     * @return type
     */
    function validateEndpointCollectionCount($endpointCollection, $requestEndpointCollection) {
        return count($endpointCollection) == count($requestEndpointCollection);
    }

    /**
     * 
     * @param type $endpointCollection
     * @param type $requestEndpointCollection
     * @return boolean
     */
    function validateEndpointCollectionElement($endpointCollection, $requestEndpointCollection) {
                
        for($i= 0; $i < count($endpointCollection); $i++) {
             
            // 10 == {id}
            // {id}
            // [id]
            if($endpointCollection[$i] != $requestEndpointCollection[$i]) {
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
    function processRequestActionMapping($requestAction) {

        $requestActionMapping = getRequestActionMapping();
        return (array_key_exists($requestAction, $requestActionMapping))  ? $requestActionMapping[$requestAction]  : $requestAction;        
    }


    // 1.Как да вземем URL адрес, който сме получили като заявка
    $requestUrlPathInformation = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : '/';
    loadApiAction($requestUrlPathInformation);

    // 2.Как да извикаме правилната функция която да обработи заявката