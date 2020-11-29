<?php 

/**
 * 
 * @return type
 */
function get_category_all() {
    
    $categoryCollection = Database::getAll("SELECT * FROM tm_categories");
    return Response::ok(array( 'data'  => $categoryCollection ));
}

/**
 * 
 * @param type $id
 * @return type
 */
function get_category_single($id) {

    $requestResult = Database::get("SELECT * FROM tm_categories WHERE id = $id");
    return Response::ok(array( 'data'  => $requestResult ));
}