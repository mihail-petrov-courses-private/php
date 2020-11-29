<?php

// SELECT * FROM tb_blog_post
function query($query) { 
    
    // Connet to database
    $connection = mysqli_connect("localhost", "root", "", "mycms");
    
    if(!$connection) {
        echo mysqli_connect_error();
        return;
    }
    
    return mysqli_query($connection, $query);
}