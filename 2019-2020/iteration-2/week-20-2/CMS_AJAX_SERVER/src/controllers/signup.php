<?php

if(isset($_POST['user_request_tokken']) AND $_POST['user_request_tokken'] == 1) {
    
    $userName           = isset($_POST['user_name'           ]) ? $_POST['user_name'    ] : '';
    $userFname          = isset($_POST['user_fname'          ]) ? $_POST['user_fname'   ] : '';
    $userLname          = isset($_POST['user_lname'          ]) ? $_POST['user_lname'   ] : '';
    $userEmail          = isset($_POST['user_email'          ]) ? $_POST['user_email'   ] : '';
    $userPass           = isset($_POST['user_pass'           ]) ? $_POST['user_pass'    ] : '';
    $userPassRepeat     = isset($_POST['user_pass_repeat'    ]) ? $_POST['user_pass_repeat'    ] : '';
    
    
    if(strlen($userName)    < 3)   {
        return setFormError('signup', 'user_name', 'Min lengt 3 characters is required');
    }
    
    if(strlen($userFname)   < 3)        {
        return setFormError('signup', 'user_fname', 'Min lengt 3 characters is required');
    }
    
    if(strlen($userLname)   < 3) {
        return setFormError('signup', 'user_lname', 'Min lengt 3 characters is required');
    }
    
    if(strlen($userEmail)   < 5) {
        return setFormError('signup', 'user_email', 'Min lengt 5 characters is required');
    }
    
    if($userPass != $userPassRepeat)  {
        return setFormError('signup', 'user_pass', 'User password and password repeat must be the same strring');
    }
    
    if(Auth::isUserAlreadyExists(array('user_name' => $userName, 'user_email' => $userEmail))) {
        return setFormError('signup', 'user_name', 'This user already exists');
    }
    
    $isUserrCreated = Auth::createNewUser(array(
        'user_name'     => $userName,
        'user_fname'    => $userFname,
        'user_lname'    => $userLname,
        'user_email'    => $userEmail,
        'user_pass'     => $userPass,
    ));
    
    if($isUserrCreated) {
        echo 'User created successfuly';
    }
}
