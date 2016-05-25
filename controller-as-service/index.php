<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/PostController.php';

$app = new Silex\Application();

#
# Registre o serviço Service Controller.
#
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->get('/', function () use ($app) {
    return "home";
});

#
# Adicione no controller o namespace do service controller
#
$app['posts.controller'] = $app->share(function() use ($app) {
    return new PostController($app);
});

#
# Adicione a rota do serviço requisitado pelo namespace seguido por `espaco:funcao`:
#
$app->get('/posts/',    "posts.controller:index");
$app->get('/posts/foo', "posts.controller:foo");

$app->run();
