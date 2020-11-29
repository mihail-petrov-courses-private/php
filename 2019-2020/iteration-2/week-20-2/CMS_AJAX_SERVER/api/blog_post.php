<?php

//// blog_post?category=10
//if(isset($_GET['category'])) {
//
//    $myCategory = $_GET['category'];
//    $blogPostCollection = Database::getAll("SELECT * FROM tb_blog_post a,
//                                            tb_blog_post__categories b
//                                            WHERE a.id = b.blog_post_id AND 
//                                            b.category_id = $myCategory");
//    
//    return Response::ok(array( 'data'  => $blogPostCollection ));
//}
//
//// blog_post/10
//if(isset($_GET['id'])) {
//    
//    $postId = $_GET['id'];
//    $blogPostEntity = Database::get("SELECT * FROM tb_blog_post a WHERE a.id = $postId");
//    
//    if(is_null($blogPostEntity)) {
//        return Response::notFound(array( 'message'  => 'Error no data found for this blog post entry. Please specify existing number '));
//    }
//    
//    return Response::ok(array( 'data'  => $blogPostEntity ));
//}
//
//// blog_post
////function index() {
//    
//    $pageLimit  = Pagination::getPageLimit();
//    $pageOffset = Pagination::getPageOffset();
//    Pagination::setTotalCount(Database::count("tb_blog_post"));
//    $blogPostCollection = Database::getAll("SELECT * FROM tb_blog_post LIMIT $pageOffset, $pageLimit");
//    return Response::ok(array( 'data'  => $blogPostCollection ));
////}

/**
 * 
 * @return type
 */
function get_blog_post_all() {
    
    $pageLimit  = Pagination::getPageLimit();
    $pageOffset = Pagination::getPageOffset();
    Pagination::setTotalCount(Database::count("tb_blog_post"));    
    
    $blogPostCollection = Database::getAll("SELECT * FROM tb_blog_post LIMIT $pageOffset, $pageLimit");
    return Response::ok(array( 'data'  => $blogPostCollection ));
}

/**
 * 
 * @param type $postId
 * @return type
 */
function get_blog_post_single($postId) {

    $blogPostEntity = Database::get("SELECT * FROM tb_blog_post a WHERE a.id = $postId");
    
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

    // blog_post?category=10
    // blog_post/category/10
    
    $blogPostCollection = Database::getAll("SELECT * FROM tb_blog_post a,
                                            tb_blog_post__categories b
                                            WHERE a.id = b.blog_post_id AND 
                                            b.category_id = $categoryId");

    return Response::ok(array( 'data'  => $blogPostCollection ));
}