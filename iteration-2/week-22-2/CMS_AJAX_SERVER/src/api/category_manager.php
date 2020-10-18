<?php 

/**
 * 
 * @return type
 */
function get_category_all() {
    
    $categoryCollection = Category::getAll();
    return Response::ok(array( 'data'  => $categoryCollection ));
}

/**
 * 
 * @param type $id
 * @return type
 */
function get_category_single($id) {

    $requestResult = Category::get($id);
    return Response::ok(array( 'data'  => $requestResult ));
}