<?php

namespace routes;

class GroupApi {
    
    // get all groups
    public function index() {
        echo "Group collection";
    }
    
    // create new group
    public function create() {
        
        $id = $_POST['group_title'];
        
        echo "$id";
    }
}