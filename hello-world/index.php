<?php

require_once __DIR__.'/vendor/autoload.php'; 

$app = new Silex\Application(); 

$app->get('/', function() use($app) { 
    return 'index.php'; 
}); 

$app->run(); 