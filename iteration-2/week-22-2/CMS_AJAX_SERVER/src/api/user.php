<?php

/**
 * 
 * @param type $id
 */
function get_user($id) {
    return Response::ok();
}

/**
 * 
 * @return type
 */
function sign_in_user() {
 
    $streemObject = Request::jsonStreem();
    
    $userRequest = array(
        'email'      => $streemObject->email, 
        'password'   => hash('sha256', $streemObject->password)
    );
    
    $userRecord = User::get($userRequest);
    
    if($userRecord) {
        
        $tokken = Auth::createNewTokken($userRequest);
        
        return Response::ok(array(
            'data'    => array(
                'tokken'    => $tokken
            ),
            'message' => 'User is loged in successfuly'
        ));
    }
    
    return Response::notFound(array(
        'message' => 'This user does not exists'
    ));
}

/**
 * 
 */
function sign_up_user() {
    
    $streemObject = Request::jsonStreem();
    
    $userRequest = array(
        'name'       => $streemObject->username,
        'fname'      => $streemObject->fname,
        'lname'      => $streemObject->lname, 
        'email'      => $streemObject->email, 
        'password'   => hash('sha256',$streemObject->password)
    );
    
    if(User::doesExists($userRequest)) {
        
       return Response::error(array(
           'message' => 'The username or e-mail is already used'
       ));
    }
    
    if(User::signup($userRequest)) {
        
       return Response::ok(array(
           'message' => 'Success'
       ));
    }
    
    return Response::error(array(
        'message' => 'Something whent wrong'
    ));    
}