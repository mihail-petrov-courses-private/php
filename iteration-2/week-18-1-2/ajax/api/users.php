<?php

$jsonText   = file_get_contents('php://input');
$phpObject  = json_decode($jsonText);

var_dump($_POST);

//$phpObject["name"] = "Todor";
$phpObject->name = "Todor";
//$phpObject["job"] = "Project Manager";
$phpObject->job = "Project Manager";
//$phpObject["age"] = "36";
$phpObject->age = 36;

echo json_encode($phpObject);


// echo $phpObject;