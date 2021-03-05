<?php

function is_file_exists($path) {
    return (file_exists($path));
}

function is_file_does_not_exists($path) {
    return !(file_exists($path));
}


function get_file_size() {
    return $_FILES['file_upload']['size'];
}


if(isset($_POST['tokken']) && $_POST['tokken'] == 1) {
    
    $originFile         = $_FILES['file_upload']['tmp_name'];
    $originFileName     = $_FILES['file_upload']['name'];
    $targetFile         = "upload/$originFileName";
    
    
    if(is_file_exists($targetFile)) {
        echo "File already exists";
        return;
    }
    
    if(get_file_size($targetFile) > 5000) {
        echo "File exseeds the limit";
        return;
    }
    
    $isUploadSuccessful = move_uploaded_file($originFile, $targetFile);
    
    if($isUploadSuccessful) {
        echo "Success upload";
    }
    else {
        echo '<pre>';
        var_dump($_FILES);
    }
}