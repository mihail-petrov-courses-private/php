<?php
/**
 * 
 * @return type
 */
function get_blog_post_all() {
    
    $blogPostCollection = BlogPost::getAll();
    return Response::ok(array( 'data'  => $blogPostCollection ));
}

/**
 * 
 * @param type $postId
 * @return type
 */
function get_blog_post_single($postId) {

    $blogPostEntity = BlogPost::get($postId);
    
    if(is_null($blogPostEntity)) {
        return Response::notFound(array( 'message'  => 'Error no data found for this blog post entry. Please specify existing number '));
    }
    
    return Response::ok(array( 'data'  => $blogPostEntity ));    
}

/**
 * 
 * @param type $categoryId
 * @return type
 */
function get_blog_post_by_category($categoryId) {

    $blogPostCollection = BlogPost::getByCateogry($categoryId);
    return Response::ok(array( 'data'  => $blogPostCollection ));
}