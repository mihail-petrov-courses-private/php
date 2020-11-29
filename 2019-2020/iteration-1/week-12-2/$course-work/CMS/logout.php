<?php

include './_external_autoload.php';

\user\User::logout();
redirect('index');