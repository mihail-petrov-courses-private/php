<?php
namespace src\client\controllers\front;

use src\client\models\UserModel as UserModel;
use src\vendor\message\Message as Message;

class SignInController {
    
    public function index() {
        load_view('front', 'signin');
    }
    
    public function signin() {
 
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
//        $dataCollection = array(
//            'username' => $_POST['username'],
//            'password' => md5($_POST['password'])
//        );
        
        // $userData = Database::fetchQuery("SELECT * FROM tb_users where username = '$username' AND password = '$password'");
        $userData = UserModel::getAllUsers(array(
            'username' => $_POST['username'],
            'password' => md5($_POST['password'])
        ));
       
        if(count($userData) == 1) {

            // QUERY builder for select statments
//            $userId = $userData[0]['id'];
//            $query = "  SELECT b.title 
//                        FROM tm_users__user_role a, 
//                                 tm_role b
//                        WHERE a.user_id = $userId AND 
//                                  a.role_id = b.id";
//
//            $userRoleCollection = Database::fetchQuery($query);
            // TODO UserModel::getRoleCollection($userId);
            
            User::auth($userData[0], $userRoleCollection);
            return redirect('index');
        }

        Message::set('sign_in_info_message', 'No user found');    
    }
    
}