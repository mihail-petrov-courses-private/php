<?php
include '../src/db/Database.php';
include '../src/util/Pagination.php';

if(isset($_GET['category'])) {

    $myCategory = $_GET['category'];
    $blogPostCollection = Database::getAll("SELECT * FROM tb_blog_post a,
                                            tb_blog_post__categories b
                                            WHERE a.id = b.blog_post_id AND 
                                            b.category_id = $myCategory");
    
    echo json_encode($blogPostCollection);
    return;
}


if(isset($_GET['id'])) {
    
    $postId = $_GET['id'];
    $blogPostEntity = Database::get("SELECT * FROM tb_blog_post a WHERE a.id = $postId");
    
    echo json_encode($blogPostEntity);
    return;
}
    
$pageLimit  = Pagination::getPageLimit();
$pageOffset = Pagination::getPageOffset();
Pagination::setTotalCount(Database::count("tb_blog_post"));
$blogPostCollection = Database::getAll("SELECT * FROM tb_blog_post LIMIT $pageOffset, $pageLimit");
echo json_encode($blogPostCollection);