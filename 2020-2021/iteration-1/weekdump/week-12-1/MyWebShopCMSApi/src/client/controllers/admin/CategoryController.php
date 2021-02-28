<?php
namespace src\client\controllers\admin;
use \src\vendor\database\Database as Database;

class CategoryController {
    
    public function index() {
        load_view('admin', 'category');
    }
    
    public function insertNewCategory() {

        $message = null;

        // TODO :  optimize 
        if(isset($_POST['category_tokken']) && $_POST['category_tokken'] == 1) {

            Database::insert('tb_categories', [
                'title' => $_POST['category_title']
            ]);

            $message = 'Success category insertion';
        }
    }    
}



