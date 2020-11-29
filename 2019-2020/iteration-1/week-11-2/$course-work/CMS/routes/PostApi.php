<?php

namespace routes;

class PostApi {
    
    public function index() {
        
        $collection = \models\Post::fetch();        
        echo json_encode($collection);
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