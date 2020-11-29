<?php 
include '../src/db/Database.php';

$categoryCollection = Database::getAll("SELECT * FROM tm_categories");
echo json_encode($categoryCollection);