<?php 
    include './_external_autoload.php';
    
    $instance = new controllers\indexController();
    $instance->index();
    
    $topickCollection = $instance->getTopicCollection();
    // $currentPage = 0;
    // $currentPage = isset($_GET['offset']) ? $_GET['offset'] : 0;
    $topickCount = $instance->getTopicCount();
    // $limit       = $instance->getTopickLimit();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style/style.css"/>
    </head>
    <body>
        
        <div id="wrapper">
            <form id        = "form_opinion" 
                  method    = "POST" 
                  name      = "public_board">
                
                <?php if(!$instance->hasTopicId()) {
                    
                    echo                 '<input name         = "topick_title" 
                       placeholder  = "Тема"/>';
                } ?>
                
                <textarea id="form_opinion__content"
                          name          = "opinion_content"  
                          placeholder   = "Коментар"></textarea>
                
                <input  id="form_opinion__author"
                       name         = "opinion_author"  
                       placeholder  = "Вашето име"/>
                 
                <input type="hidden" name="tokken" value="1"/>
                
                <input id="form_opinion__submit"
                       class    = "button" 
                       type     = "submit" 
                       value    = "Изкажи се">
            </form>
            
            <div id="opinion_placeholder"
                 class="opinion">
                <?php 
                
//                if(!is_null($topickCollection)) {
//                    
//                    foreach ($topickCollection as $element) {
//                        echo '<div class="opinion-entry">';
//                        echo '<h3>'.$element['title'] . '</h3>';
//                        echo '<div>' . $element['content'] . '</div>';
//                        echo '</div>';
//                    }                    
//                }
//                else {
//                    echo 'Няма коментари към тази тема все още';
//                }
               
                ?>
            </div>
            
            <?php // pagination($topickCount);  ?>
        </div>
        
        <script src="script/ajax_get_opinion.js"></script>
        <script src="script/ajax_post_opinion.js"></script>
    </body>
</html>
