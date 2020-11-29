<?php

session_start();

define('BASE_URL', 'http://localhost/public_board/index.php');

function redirect($address) {
    header("Location: $address.php");
}

function base_url() {
    //return "http://localhost/public_board/index.php";
    return BASE_URL;
}

function pagination_url() {
    return base_url(). '?page_index=';
}

function pagination_prev($totalCount, $limit = null) {
    
    $pageLimit      = is_null($limit) ? pagination_get_limit() : $limit;
    $currentPage    = pagination_get_page_index();
    $prevPage       = ($currentPage == 0)   ? 0
                                            : $currentPage - 1;
    
    if($currentPage > 0) {    
        echo "<a class='pagination pagination-prev' href='" . pagination_url() . "{$prevPage}'>Предишна</a>";
    }
}

function pagination_next($totalCount, $limit = null) {
    
    // TOTAL_COUNT : 8
    // current page : based over the LIMIT
    // LIMIT : 5
    // TOTL_PAGE = TOTAL_COUNT / LIMIT
    $pageLimit = is_null($limit) ? pagination_get_limit() : $limit;
    $totalPageCount = ceil($totalCount / $pageLimit);
    
    
    // totalCount -1 <= $currentPage
    
    $currentPage    = pagination_get_page_index();
    $nextPage       = $currentPage + 1;
    $nextPage       =  (($totalPageCount - 1) >= $currentPage)  ? $currentPage + 1 
                                                                : $totalPageCount - 1;
    
    if($currentPage + 1 < $totalPageCount) {
        echo "<a class='pagination pagination-next' href='" . pagination_url() . "{$nextPage}'>Следваща</a>";    
    }    
}

function pagination($totalCount, $limit = null) {
    
    pagination_prev($totalCount, $limit);
    pagination_next($totalCount, $limit);
}


function pagination_get_page_index() {
    return isset($_GET['page_index']) ? ($_GET['page_index']  )
                                        : 0;
}

function pagination_get_offset($limit = null) {
    
    $pageLimit      = is_null($limit) ? pagination_get_limit() : $limit;
    return pagination_get_page_index() * $pageLimit;
}

function pagination_get_limit($limit = 50) {
    return $limit;
}


spl_autoload_register(function($element) {

    // 1. explode
    // str_replace
    $collection = explode('\\', $element);

    $newPath = ".";

    foreach($collection as $value) {
        $newPath = $newPath . '/' . $value;
    }

    $newPath = $newPath . '.php';

    include $newPath;
});