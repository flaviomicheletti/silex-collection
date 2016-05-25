<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;
$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__ . '/views'));

$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1',
    'assets.version_format' => '%s?version=%s',
    'assets.named_packages' => array(
        'css' => array('version' => 'css3', 'base_path' => '/css'),
        'images' => array('base_path' => '/imagens'),
    ),
));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.twig');
});

$app->run();