<?php

if(Auth::isNotAuthenticated()) {
    redirectTo("signin");
}

function listAllBlogPost() {

    $myCategory         = null;
    $totalItemPerPage   = 5;
    
    if(isset($_GET['post_search_tokken']) AND $_GET['post_search_tokken'] == 1) {

        $searchQuery            = $_GET['q'];
        $searchDescriptorColumn = $_GET['q_selector'];
        
        $categoryQuery          = $myCategory ? " b.category_id = $myCategory     AND " : "";
        $requestQuery           = "SELECT * FROM tb_blog_post a,
                                            tb_blog_post__categories b
                                            WHERE a.id = b.blog_post_id     AND 
                                            $categoryQuery 
                                            a.$searchDescriptorColumn LIKE '%$searchQuery%'";                                                
                
        // $requestQuery           = "SELECT * FROM tb_blog_post WHERE $searchDescriptorColumn LIKE '%$searchQuery%'";
        return Database::query($requestQuery);
    }
    
    
    if(isset($_GET['category'])) {
        
        $myCategory = $_GET['category'];
        return Database::query("SELECT * FROM tb_blog_post a,
                                tb_blog_post__categories b
                                WHERE a.id = b.blog_post_id AND 
				b.category_id = $myCategory");
    }    
    
    $pageLimit  = Pagination::getPageLimit();
    $pageOffset = Pagination::getPageOffset();
    Pagination::setTotalCount(Database::count("tb_blog_post"));
    return Database::getAll("SELECT * FROM tb_blog_post LIMIT $pageOffset, $pageLimit");
}


function listAllBlogCategory() {    
    return Database::query("SELECT * FROM tm_categories");
}

