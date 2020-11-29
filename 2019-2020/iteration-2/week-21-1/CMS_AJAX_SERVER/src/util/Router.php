<?php

class Router {
    
    private static $placeholderCollection = array();
    
    public static function isOptionalPlaceholder($placeholder) {
        return Router::isPlaceholder($placeholder, '{', '}');
    }

    public static function isRequiredPlaceholder($placeholder) {
        return Router::isPlaceholder($placeholder, '[', ']');
    }
    
    public static function pushPlaceholderValue($placeholderValue) {
        array_push(Router::$placeholderCollection, $placeholderValue);
    }

    public static function getPlaceholderValueCollection() {
        return Router::$placeholderCollection;
    }

    // {placeholder} -> true / false
    private static function isPlaceholder($placeholder, $leftTerminal, $rightTerminal) {

        $placeholderLength = strlen($placeholder);
        $startPosition  = strpos($placeholder, $leftTerminal);
        $endPosition    = strpos($placeholder, $rightTerminal);

        return (($startPosition == 0) &&
               ($endPosition    == ($placeholderLength - 1)));
    }
}