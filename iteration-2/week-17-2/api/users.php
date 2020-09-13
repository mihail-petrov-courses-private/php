<?php

$userId = isset($_GET['user_id']) ? $_GET['user_id'] : NULL;

$apiResponse = array(
    "data" => array(
        array(
            "id"        => 1,
            "email"     => "george.bluth@reqres.in",
            "first_name"=> "George",
            "last_name" => "Bluth",
            "avatar"    => "https://s3.amazonaws.com/uifaces/faces/twitter/calebogden/128.jpg"
        ),

        array(
            "id"        => 2,
            "email"     => "janet.weaver@reqres.in",
            "first_name"=> "Janet",
            "last_name" => "Weaver",
            "avatar"    => "https://s3.amazonaws.com/uifaces/faces/twitter/josephstein/128.jpg"
        )
    )
);

function transformApi($apiResponse, $userId) {

    if($userId == NULL) {
        return $apiResponse;
    }


    $apiResponseData = $apiResponse["data"];

    foreach ($apiResponseData as $element) {

        if($element["id"] == $userId) {
            return array( "data" => $element );
        }
    }
}


echo json_encode(transformApi($apiResponse, $userId));