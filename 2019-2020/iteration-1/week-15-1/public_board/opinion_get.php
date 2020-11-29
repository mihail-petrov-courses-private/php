<?php

include './_external_autoload.php';

$instance = new controllers\indexController();
$instance->index();

echo $instance->getTopicCollectionJson();