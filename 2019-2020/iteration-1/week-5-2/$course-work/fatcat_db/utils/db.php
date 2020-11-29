<?php

function db_query($query) {
 
    $mysqlConnection = mysqli_connect("localhost", "root", "", "fatcat");
        
    if(mysqli_connect_errno()) {

        echo "<strong>Failed to connect</strong>";
        echo "<br>";
        echo mysqli_connect_error();
        echo "<br>";
        echo mysqli_connect_errno();
        return false;
    }
    
    $resourcePointer = mysqli_query($mysqlConnection, $query);
    
    if(is_object($resourcePointer)) {
        return mysqli_fetch_assoc($resourcePointer);
    }
    
    return $resourcePointer;
}

function db_get_last_inserted_id() {
    
    $mysqlConnection = mysqli_connect("localhost", "root", "", "fatcat");
    return mysqli_insert_id($mysqlConnection);
}