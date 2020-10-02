<?php
include './src/db/Database.php';
include './src/util/Pagination.php';
include './src/util/Response.php';

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

    $requestActionMapping = array(  
        'category'  => 'category_manager'
    );
    
    $requestActionFileCollection = explode("/", $requestUrlPathInformation);
    $requestAction      = $requestActionFileCollection[1];
    $requestActionFile  = (array_key_exists($requestAction, $requestActionMapping))  ? $requestActionMapping[$requestAction] 
                                                                                     : $requestAction;

    include './api/' . $requestActionFile . '.php';
}

// 1.Как да вземем URL адрес, който сме получили като заявка
$requestUrlPathInformation = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
loadApiAction($requestUrlPathInformation);

// 2.Как да извикаме правилната функция която да обработи заявката