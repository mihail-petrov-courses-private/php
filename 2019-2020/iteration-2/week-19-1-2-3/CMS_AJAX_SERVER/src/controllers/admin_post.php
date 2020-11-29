<?php

if(!(Auth::isAdmin() || Auth::isModerator())) {
    redirectTo('signin');
}

if(isset($_POST['create_new_post_tokken']) && $_POST['create_new_post_tokken'] == '1') {
    
    $postTitle          = $_POST['post_title'];
    $postCategory       = $_POST['post_category'];
    $postContent        = $_POST['post_content'];
    $postPreviewContent = $_POST['post_preview_content'];
    
    $createPostQuery = "INSERT INTO tb_blog_post(title, content, priview_content) "
                      . "VALUES('$postTitle', '$postContent', '$postPreviewContent')";
    
    Database::query($createPostQuery);
    $postId = Database::getLastInsertedId();
    
    $createPostCategoryQuery = "INSERT INTO tb_blog_post__categories(blog_post_id, category_id) "
                              . "VALUES($postId, $postCategory)";
    
    Database::query($createPostCategoryQuery);
}