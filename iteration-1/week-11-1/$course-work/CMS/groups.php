<?php
    include './external_autoload.php';
    (new controllers\GroupController())->index();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CMS</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/admin.css">
    </head>
    <body>
        
        <div id="admin-header">
            <h1 class="logo">Admin CMS</h1>
            <div id="admin-header-placeholder">
                <ul>
                    <li>Add new</li>
                    <li>List posts</li>
                    <li><a href="admin.php?action=logout">Log out</a></li>
                </ul>
            </div>
        </div>
                   
        <div id="message-baner" class="message success">
            Success record !!!
        </div>
        
        <div class="admin-editor">
            <form id="admin-group-editor" method="POST" name="admin-group-editor">
                <input id           = "group_title" 
                       class        = "form-input" 
                       type         = "text" 
                       placeholder  = "Group title" 
                       name         = "group_title">
                
                <input id           = "admin-group-editor-submit"
                       class        = "button" 
                       type         = "submit" 
                       name         = "group_submit"
                       style        = "display: inline-block">                
                
                <input id           = "admin-group-editor-edit-cancel"
                       class        = "button" 
                       type         = "button" 
                       value        = "Cancel edit"
                       name         = "group_cancel"
                       style        = "display: inline-block">                                
                
                <input type         = "hidden" 
                       name         = "post_tokken" 
                       value        = "1">
            </form>
        </div>
        
        <div id     = "group-container" 
             class  = "admin-editor"></div>
        

        <script src="scripts/client/netitquery.js"></script>
        <script src="scripts/vendor/jquery.js"></script>
        <script src="scripts/application/groups.js"></script>
    </body>
</html>
