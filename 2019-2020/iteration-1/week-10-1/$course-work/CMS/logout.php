<?php

include './external_autoload.php';

\user\User::logout();
redirect('index');