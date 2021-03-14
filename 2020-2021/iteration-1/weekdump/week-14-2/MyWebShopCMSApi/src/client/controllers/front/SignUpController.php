<?php
namespace src\client\controllers\front;
use src\vendor\message\Message          as Message;
use \src\client\models\UserModel        as UserModel;
use src\vendor\validation\Validator     as Validator;
use src\vendor\http\Response            as Response;

class SignUpController {
   

    public function signup() {
 
        $username       = $_POST['username'];
        $password       = $_POST['password'];
        $repeatPassword = $_POST['repeat_password'];
        $email          = $_POST['email'];

        if(!Validator::hasMinLength($username, 5)) {
            return Message::set('sign_up_info_message', "Username length is below than 5 characters");
        }

        if(!Validator::hasMinLength($password, 5)) {
            return Message::set('sign_up_info_message', "Password length is below than 5 characters");
        }

        if(!Validator::hasMinLength($email, 5)) {
            return Message::set('sign_up_info_message', "E-mail length is below than 5 characters");
        }    

        if(!Validator::isRepeatPasswordValid($password, $repeatPassword)) {
            return Message::set('sign_up_info_message', "Original and repeat password does not match");
        }

        $isCreatedSuccessfuly = UserModel::createNewUser(array(
            'username'  => $username,
            'password'  => $password,
            'email'     => $email
        ));
        
        if($isCreatedSuccessfuly) {
            Response::success([
                'message'       => 'User is created succesfuly',
                'messageCode'   => 'USER_CREATED'
            ]);
        }
        else {
            Response::fail([
                'message'       => 'Username or password already exists',
                'messageCode'   => 'USER_FAIL'
            ]);
        }
    }
}