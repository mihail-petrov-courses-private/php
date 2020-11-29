<?php

namespace controllers;

class indexController {
    
    private $topicCollection;
    private $topicCount;
    
    private $userMoodCollection;
    
    public function index() {
           
        if(isset($_FILES['opinion_file'])) {
            
            $fileReference      = $_FILES['opinion_file'];
            $fileName           = $fileReference['name'];
            $fileOriginPath     = $fileReference['tmp_name'];
            $uploadDirectory    = "upload/" . time() . ".jpg";

            echo $fileOriginPath . '<br>';
            echo $uploadDirectory . '<br>';
            if($fileReference['error'] == 0) {
                if(move_uploaded_file($fileOriginPath, $uploadDirectory)) {
                    echo "Success upload";
                }
                else {
                    echo "Upload failed";
                }
            }
        }
        
//        
//        $requestArgumentCollection = array(
//            'id'        => $this->getTopicId(),
//            'offset'    => pagination_get_offset(),
//            'limit'     => pagination_get_limit()
//        );        
//        
//        $this->topicCollection  = \models\TopickModel::readWithOpinion($requestArgumentCollection);
//        $this->topicCount       = \models\TopickModel::readWithOpininonCount($requestArgumentCollection);
//        
//        $this->userMoodCollection = \models\MoodModel::read();
//        
//        // List all opininos based on this topic
//        if(isset($_POST['tokken']) && $_POST['tokken'] == 1) {
//            $this->create();
//        }
    }
    
    public function create() {
            
        if($this->hasTopicId()) {

            $requestArgumentCollection = array(
                'id' => $this->getTopicId(),
                'opinion_content'   => $_POST['opinion_content'],
                'opinion_author'    => $_POST['opinion_author'],
                'opinion_mood'      => $_POST['opinion_mood']
            );
            
            $opinionId = \models\OpinionModel::create($requestArgumentCollection);

            if(!is_null($opinionId)) {
                
                $requestArgumentCollection = array(
                    'id' => $this->getTopicId()
                );
                $this->topicCollection  = \models\TopickModel::readWithOpinion($requestArgumentCollection);
            }
            return;
        }

        $topickTitle    = $_POST['topick_title'];
        $topickId       = \models\TopickModel::create($topickTitle);

        if(!is_null($topickId)) {

            $requestArgumentCollection = array(
                'id'                => $topickId,
                'opinion_content'   => $_POST['opinion_content'],
                'opinion_author'    => $_POST['opinion_author'],
                'opinion_mood'      => $_POST['opinion_mood']
            );

            $opinionId = \models\OpinionModel::create($requestArgumentCollection);

            if(!is_null($opinionId)) {

                $requestArgumentCollection = array(
                    'id' => $topickId
                );
                
                $this->topicCollection  = \models\TopickModel::readWithOpinion($topickId);
                // $this->topicId          = $topickId;
                $_SESSION['topick_id']  = $topickId;
            }
        }
    }
    
    public function getTopicCollection() {
        return $this->topicCollection;
    }
    
    public function getTopicCollectionJson() {
        return json_encode($this->topicCollection);
    }


    public function getTopicId() {
        
        if(isset($_SESSION['topick_id'])) {
            return $_SESSION['topick_id'];
        }
    }
    
    public function hasTopicId() {
        return !is_null($this->getTopicId());
    }
    
    
    public function getTopicCount() {
        return $this->topicCount;
    }
    
    public function getMoodCollection() {
        return $this->userMoodCollection;
    }
}