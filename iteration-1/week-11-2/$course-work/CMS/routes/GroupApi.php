<?php

namespace routes;

class GroupApi {
    
    // TODO: refactor repeating fetch logic
    public function index() {
        
        $collection = \models\Group::fetch();
        echo json_encode($collection);
    }
    
    public function update() {
        
        $groupid    = $_POST['group_id'];
        $groupTitle = $_POST['group_title'];
        
        $response = \models\Group::update($groupid, $groupTitle);
        
        if($response) {
            echo "Success";
        }
        else {
            echo "Fail";
        }
    }
    
    public function delete() {
        
        $groupId = $_POST['group_id'];
        $response = \models\Group::delete($groupId);
        
        if($response) {
            echo "Success";
        }
        else {
            echo "Fail";
        }        
    }
    
    
    // create new group
    public function create() {
        
        $groupTitle = $_POST['group_title'];
        $recordId = \models\Group::create($groupTitle, 1);
        
        if($recordId) {
                    
            $collection = \models\Group::fetch($recordId);
            echo json_encode($collection);
        }
        else {
            echo "Error";
        }
    }
}