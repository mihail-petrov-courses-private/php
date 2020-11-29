<?php

namespace routes;

class PostApi {
    
    public function index() {
        $collection = \blogpost\BlogPost::fetch();
//     
//        foreach ($collection  as $value) {
//
//           echo "<div class='post'>";
//           echo "<header class='post-title'>{$value['title']}</header>";
//           echo "<div class='post-timestamp'>преди 1 час</div>";
//           echo "<a href='#'> - </a>";
//           echo "</div>";
//        }    
        
        echo json_encode($collection);
    }
}