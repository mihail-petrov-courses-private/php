<?php
/**
 * 
 * @param type $fileName
 * @return type
 */
function isFileEmpty($fileName) {
    return strlen(file_get_contents($fileName)) == 0;
}

/**
 * 
 * @param type $fileName
 * @return type
 */
function select($fileName) {
          
    if(file_exists($fileName)) {
        return unserialize(file_get_contents($fileName));
    }
    
    return [];
    
    // return (file_exists($fileName)) ? unserialize(file_get_contents($fileName)) : []
    //      
}

/**
 * 
 * @param type $fileName
 */
function update($fileName, $searchId, $replaceArrayElement) {
    
    $temporalArrayCollection = select($fileName);
    
    for($i = 0; $i < count($temporalArrayCollection); $i++) {
        
        if($temporalArrayCollection[$i]['id'] == $searchId) {
           $temporalArrayCollection[$i] =  $replaceArrayElement;
        }        
    }    
    
    return file_put_contents($fileName, serialize($temporalArrayCollection));
}

/**
 * 
 * @param type $fileName
 * @param type $arrayCollection
 */
function insert($fileName, $arrayCollection) {    
    
    if(isFileEmpty($fileName)) {
        return file_put_contents($fileName, serialize($arrayCollection));
    }
    
    $temporalArrayCollection = select($fileName);
    
    foreach ($arrayCollection as $element) {
        array_push($temporalArrayCollection, $element);
    }
    
    return file_put_contents($fileName, serialize($temporalArrayCollection));
}

/**
 * 
 * @param type $fileName
 */
function delete($fileName) {
    file_put_contents($fileName, "");
}