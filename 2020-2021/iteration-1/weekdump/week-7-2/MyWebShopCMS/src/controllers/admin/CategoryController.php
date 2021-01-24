<?php

$message = null;

// TODO :  optimize 
if(isset($_POST['category_tokken']) && $_POST['category_tokken'] == 1) {
    
    Database::insert('tb_categories', [
        'title' => $_POST['category_title']
    ]);
    
    
    $message = 'Success category insertion';
}