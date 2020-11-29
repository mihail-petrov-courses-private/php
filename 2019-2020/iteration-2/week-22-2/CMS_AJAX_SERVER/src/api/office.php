<?php

function get_all_office_location() {
    
//    if(!Auth::isTokkenAvailable(Request::authTokken())) {
//        return Response::forbidden();    
//    }
    
    $officeCollection = Office::getAll();
    return Response::ok(array( 'data'  => $officeCollection ));
}