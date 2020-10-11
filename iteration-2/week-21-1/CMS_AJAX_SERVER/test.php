<?php

// {placeholder} -> true / false
function isPlaceholder($placeholder, $leftTerminal, $rightTerminal) {
    
    $placeholderLength = strlen($placeholder);
    $startPosition  = strpos($placeholder, $leftTerminal);
    $endPosition    = strpos($placeholder, $rightTerminal);
    
    return (($startPosition == 0) &&
           ($endPosition    == ($placeholderLength - 1)));
}

function isOptionalPlaceholder($placeholder) {
    return isPlaceholder($placeholder, '{', '}');
}

function isRequiredPlaceholder($placeholder) {
    return isPlaceholder($placeholder, '[', ']');
}

var_dump(isPlaceholder("{id"));
var_dump(isPlaceholder("{id}"));