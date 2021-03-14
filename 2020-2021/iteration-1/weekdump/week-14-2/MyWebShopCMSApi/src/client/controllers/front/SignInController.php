<?php
namespace src\client\controllers\front;

use src\client\models\UserModel as UserModel;
use src\vendor\http\Response   as Response;

class SignInController {
    
    public function signin() {
 
        $userData = UserModel::getAllUsers(array(
            'username' => $_POST['username'],
            'password' => md5($_POST['password'])
        ));
       
        if(count($userData) == 1) {
            
            return Response::success([
                'message'       => 'User loged in successfuly',
                'messageCode'   => 'USER_LOGED_IN', 
                'data'          => [
                    'access_tokken' => UserModel::registerTokken()
                ]
            ]);
        }
        
        return Response::fail([
            'message' => 'User name or password is incorect',
            'messageCode' => 'USER_NOT_LOGED_IN'
        ]);
    }
    
}