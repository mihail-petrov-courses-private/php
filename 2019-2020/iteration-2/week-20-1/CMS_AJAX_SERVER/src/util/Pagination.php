<?php

class Pagination {
    
    private static $pageLimit = 5;
    private static $totalCount = 0;

    static function setPageLimit($pageLimit) {
        Pagination::$pageLimit = $pageLimit;
    }

    static function getPageLimit() {
        return Pagination::$pageLimit;
    }
    
    static function getPageOffset() {
        
        return (Pagination::getPageIndex() - 1) * 
               (Pagination::getPageLimit());
    }
    
    static function getPageIndex() {
        return isset($_GET['page_index']) ? $_GET['page_index'] : 1;
    }
    
    static function setTotalCount($count) {
        Pagination::$totalCount = $count;
    }
    
    static function getTotalCount() {
        return Pagination::$totalCount;
    }    
    
    static function hasNextPage() {
        return (Pagination::getPageOffset() + Pagination::getPageLimit()) < Pagination::getTotalCount();
    }
    
    static function hasPrevPage() {
        return Pagination::getPageIndex() > 1;
    }
    
    static function display() {
        
        $pageIndex      = Pagination::getPageIndex();
        $nextPageIndex  = $pageIndex + 1;
        $prevPageIndex  = $pageIndex - 1;
        
        if(Pagination::hasPrevPage()) {
            echo "<a class='pagination' href='?page_index=$prevPageIndex'>Prev</a>";
        }        
        
        echo '<span>' . Pagination::getPageOffset() . ' - ' . Pagination::getTotalCount() . '</span>';
        
        if(Pagination::hasNextPage()) {
            echo "<a class='pagination' href='?page_index=$nextPageIndex'>Next</a>";        
        }
    }
    
    
}