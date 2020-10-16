    <?php
    include './src/db/Database.php';
    include './src/util/Pagination.php';
    include './src/util/Request.php';
    include './src/util/Response.php';
    include './src/util/Router.php';
    include './config/routes.php';
    
    include './src/models/BlogPost.php';
    include './src/models/Category.php';
    include './src/models/User.php';
    

    Router::bootstrap();