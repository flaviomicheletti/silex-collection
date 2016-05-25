<?php

require_once __DIR__.'/vendor/autoload.php'; 

$app = new Silex\Application(); 

$app->get('/', function() use($app) { 
    return 'GET index.php'; 
});

$app->post('/', function() use($app) { 
    return 'POST index.php'; 
});

$app->put('/', function() use($app) { 
    return 'PUT index.php'; 
});

$app->delete('/', function() use($app) { 
    return 'DELETE index.php'; 
});

$app->run(); 