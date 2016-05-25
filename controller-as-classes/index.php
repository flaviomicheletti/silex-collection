<?php

require_once __DIR__.'/vendor/autoload.php'; 

require_once "controller.php";

$app = new Silex\Application(); 
$app->get('/', 'Acme\\Foo::bar');
$app->run(); 