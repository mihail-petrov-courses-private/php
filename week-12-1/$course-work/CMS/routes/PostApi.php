<?php

namespace routes;

class PostApi {
    
    public function index($id = null) {
        
        $collection = \models\Post::fetch($id);
        echo json_encode($collection);
    }
    
    
    public function group($id) {
        
        $collection = \models\Post::fetchPostByGroup($id);
        echo json_encode($collection);        
    }


    public function create() {
        
        //$title          = $argumentCollection['title'];
        //$previewContent = $argumentCollection['preview_contet'];
        //$content        = $argumentCollection['content'];
        //$groupId        = $argumentCollection['group_id'];        
        
        
        $argumentCollection = array(
            'title'           => $_POST['post_title'],
            'preview_contet'  => $_POST['post_preview'],
            'content'         =>  $_POST['post_content'],
            'group'           =>  $_POST['post_group'],
        );
        
        
        //$blogPostTitle    = $_POST['post_title'];
        //$blogPostPreview  = $_POST['post_preview'];
        //$blogPostContent  = $_POST['post_content'];
        //$blogPostCategory = $_POST['post_category'];         
        
        $postId = \models\Post::create($argumentCollection); // POST
        // $postId = \models\Post::create($blogPostTitle, $blogPostPreview, $blogPostContent); // POST
        
        if($postId) {
            
            $collection = \models\Post::fetch($recordId);
            echo json_encode($collection);
        }   
        else {
            echo "Error";
        }
    }

    public function delete() {
        
        $id         = $_POST['post_id'];
        $isDeleted  = \models\Post::delete($id);
        
        if($isDeleted) {
            echo "Success";
        }
        else {
            echo "Error";
        }
    }
}