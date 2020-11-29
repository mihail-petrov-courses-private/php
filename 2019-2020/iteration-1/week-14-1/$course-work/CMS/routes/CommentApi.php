<?php

namespace routes;

class CommentApi {
    
    public static function index($id = null) {
        
        $collection = \models\Comment::fetch($id);
        echo json_encode($collection);
    }
    
    public static function create() {
        
        $request = array(
            'postId'  => $_POST['postId'],
            'content' => $_POST['content'],
            'author'  => $_POST['author']
        );
        
        $postId = \models\Comment::create($request);
        if($postId) {
            CommentApi::index();
        }
        else {
            echo "Sorry try next time";
        }
    }
}