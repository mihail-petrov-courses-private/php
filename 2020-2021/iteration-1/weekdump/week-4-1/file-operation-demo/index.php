<?php

include './database.php';

insert("db_customer", [
    ['id' => 1, 'name' => 'Mihail Petrov' ],
    ['id' => 2, 'name' => 'Ivan Ivanov'   ],
    ['id' => 3, 'name' => 'Gosho'         ]
]);

insert("db_customer", [
    ['id' => 4, 'name' => 'Pesho' ],
]);

insert("db_customer", [
    ['id' => 5, 'name' => 'Nencho Kasabov' ],
    ['id' => 7, 'name' => 'Lubka Gibekova' ],
]);

update("db_customer", [ 'id' => 10], [
    'name' => 'SELECTED'
]);

// delete("db_customer");


echo '<pre>';
var_dump(select("db_customer"));
