<?php

namespace controllers;

class indexController {
    
    private $topicCollection;
    private $topicCount;
    
    public function index() {
                
        $requestArgumentCollection = array(
            'id'        => $this->getTopicId(),
            'offset'    => pagination_get_offset(),
            'limit'     => pagination_get_limit()
        );        
        
        $this->topicCollection  = \models\TopickModel::readWithOpinion($requestArgumentCollection);
        $this->topicCount       = \models\TopickModel::readWithOpininonCount($requestArgumentCollection);
        
        // List all opininos based on this topic
        if(isset($_POST['tokken']) && $_POST['tokken'] == 1) {
            $this->create();
        }
    }
    
    public function create() {
            
        if($this->hasTopicId()) {

            $opionionContent    = $_POST['opinion_content'];
            $opionionAuthor     = $_POST['opinion_author'];

            $opinionId = \models\OpinionModel::create($this->getTopicId(), $opionionContent, $opionionAuthor);

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

            $opionionContent    = $_POST['opinion_content'];
            $opionionAuthor     = $_POST['opinion_author'];

            $opinionId = \models\OpinionModel::create($topickId, $opionionContent, $opionionAuthor);

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
}