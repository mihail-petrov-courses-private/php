<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CMS</title>
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
                </ul>
            </div>
        </div>
        
        <div id="admin-editor">
            <form method="POST" name="admin-post-editor">
                <input class="form-input" type="text" placeholder="Post title" name="post_title">
                <textarea class="form-textarea h-160"  placeholder="Post content" name="post_content"></textarea>
                <input class="button" type="submit" name="post_submit">
                
                <input type="hidden" name="post_tokken" value="1">
            </form>
        </div>

    </body>
</html>
