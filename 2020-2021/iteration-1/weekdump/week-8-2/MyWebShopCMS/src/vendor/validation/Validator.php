<?php

class Validator {
    
    public static function hasMinLength($input, $minLength) {
        return strlen($input) >= $minLength;
    }

    public static function isRepeatPasswordValid($originalPassword, $repeatPassword) {
        return $originalPassword == $repeatPassword;
    }
}