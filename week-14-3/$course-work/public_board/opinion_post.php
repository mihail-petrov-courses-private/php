<?php

include './_external_autoload.php';

$instance = new controllers\indexController();
$instance->create();

$instance->index();
echo $instance->getTopicCollectionJson();