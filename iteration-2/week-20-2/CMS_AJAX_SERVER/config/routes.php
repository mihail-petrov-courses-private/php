<?php

function getRequestActionMapping() {
    
    return array(  
        'category'  => 'category_manager'
    );
}

function getRequestEndpointMapping() {
    
return array(

        array(
            'endpoint'      => 'blog_post',
            'execute'       => 'get_blog_post_all',
            'method'        => 'GET'
        ),

        array(
            'endpoint'      => 'blog_post/{id}',
            'execute'       => 'get_blog_post_single',
            'method'        => 'GET'
        ),

        array(
            'endpoint'      => 'blog_post/category/{category_id}',
            'execute'       => 'get_blog_post_by_category',
            'method'        => 'GET'
        ),
//
//        array(
//            'endpoint'      => 'category',
//            'execute'       => 'get_category_all',
//            'method'        => 'GET'
//        ),
//
//        array(
//            'endpoint'      => 'category/{id}',
//            'execute'       => 'get_category_single',
//            'method'        => 'GET'
//        ),
//
//        array(
//            'endpoint'      => 'user/{id}',
//            'execute'       => 'get_user',
//            'method'        => 'GET'
//        ),
//
//        array(
//            'endpoint'      => 'user/signin',
//            'execute'       => 'sign_in_user',
//            'method'        => 'POST'
//        ),
//
//        array(
//            'endpoint'      => 'user/signup',
//            'execute'       => 'sign_up_user',
//            'method'        => 'POST'
//        )
    );
}