<?php
include '../src/db/Database.php';
include '../src/util/Pagination.php';

$jsonObject     = file_get_contents("php://input");
$phpObject      = json_decode($jsonObject);

$userEmail      = $phpObject->email;
$userPassword   = $phpObject->password;

$checkIfUserExistsQuery = "SELECT * "
                        . "FROM tb_users "
                        . "WHERE email = '$userEmail' AND password = '$userPassword'";

$userRecord = Database::get($checkIfUserExistsQuery);

if($userRecord) {

    $userRoleId                 = $userRecord['id'];
    $getUserRoleCollectionQuery = " SELECT b.title AS role_title"
                                . " FROM tb_user__role  AS a, "
                                . "     tm_roles        AS b "
                                . " WHERE user_id = $userRoleId AND "
                                . " a.role_id = b.id";
    $userRoleCollection         = Database::getAll($getUserRoleCollectionQuery);

    $result = array(
        'message' => 'Success'
    );

    echo json_encode($result);
} 
else {
        $result = array(
        'message' => 'Error'
    );

    echo json_encode($result);
}

/*
if(isset($_POST['user_request_tokken']) && $_POST['user_request_tokken'] == 1) {


 
    $userEmail      = $_POST['user_email'   ];
    $userPassword   = $_POST['user_pass'    ];
    
    $checkIfUserExistsQuery = "SELECT * "
                            . "FROM tb_users "
                            . "WHERE email = '$userEmail' AND password = '$userPassword'";
    
    $userRecord = Database::get($checkIfUserExistsQuery);
    
    if($userRecord) {
        
        $userRoleId                 = $userRecord['id'];
        $getUserRoleCollectionQuery = " SELECT b.title AS role_title"
                                    . " FROM tb_user__role  AS a, "
                                    . "     tm_roles        AS b "
                                    . " WHERE user_id = $userRoleId AND "
                                    . " a.role_id = b.id";
        $userRoleCollection         = Database::getAll($getUserRoleCollectionQuery);
        
        Auth::setAuthenticatetUser(array(
            'user_data_collection' => $userRecord,
            'user_role_collection' => $userRoleCollection
        ));
        
        return redirectTo('index');
    }
    
    return setFormError("signin"                        , 
                        "user_email"                    , 
                        "Login atempt is not succsessful");
}
 * 
 */