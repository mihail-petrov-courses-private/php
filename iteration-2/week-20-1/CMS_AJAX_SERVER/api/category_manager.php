<?php 
// include '../src/db/Database.php';

$categoryCollection = Database::getAll("SELECT * FROM tm_categories");
return Response::ok(array( 'data'  => $categoryCollection ));

// echo json_encode($categoryCollection);