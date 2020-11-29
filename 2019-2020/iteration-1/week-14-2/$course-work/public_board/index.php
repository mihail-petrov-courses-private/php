<?php 
    include './_external_autoload.php';
    
    $instance = new controllers\indexController();
    $instance->index();
    
    $topickCollection = $instance->getTopicCollection();
    // $currentPage = 0;
    $currentPage = isset($_GET['offset']) ? $_GET['offset'] : 0;
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
            <form method="POST" name="public_board">
                
                <?php if(!$instance->hasTopicId()) {
                    
                    echo                 '<input name         = "topick_title" 
                       placeholder  = "Тема"/>';
                } ?>
                
                <textarea name          = "opinion_content"  
                          placeholder   = "Коментар"></textarea>
                
                <input name         = "opinion_author"  
                       placeholder  = "Вашето име"/>
                 
                <input type="hidden" name="tokken" value="1"/>
                
                
                <input class    = "button" 
                       type     = "submit" 
                       value    = "Изкажи се">
            </form>
            
            <div class="opinion">
                <?php 
                
                if(!is_null($topickCollection)) {
                    
                    foreach ($topickCollection as $element) {
                        echo '<div class="opinion-entry">';
                        echo '<h3>'.$element['title'] . '</h3>';
                        echo '<div>' . $element['content'] . '</div>';
                        echo '</div>';
                    }                    
                }
                else {
                    echo 'Няма коментари към тази тема все още';
                }
               
                ?>
            </div>
            <a class="pagination" href="http://localhost/public_board/index.php?offset=<?php echo $currentPage - 1; ?>">Предишна</a>
            <a class="pagination" href="http://localhost/public_board/index.php?offset=<?php echo $currentPage + 1; ?>">Следваща</a>
            
        </div>
    </body>
</html>
