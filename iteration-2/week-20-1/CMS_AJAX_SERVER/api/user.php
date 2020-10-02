<?php

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
    
    // echo json_encode($result);
    return Response::ok(array('message' => 'User is loged in successfuly'));
} 

return Response::notFound(array('message' => 'This user does not exists'));