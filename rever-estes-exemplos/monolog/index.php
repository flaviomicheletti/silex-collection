<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/desenvolvimento.log',
    'monolog.name'    => "app",
    'monolog.level'   => "DEBUG" // "DEBUG", "INFO", "WARNING", "ERROR"
));


$app->get('/', function () use ($app) {
    return ""
        . "<h1>Monolog</h1>"
        . "<p><a href='ola/João'>Olá João</a></p>";
});

$app->get('/ola/{nome}', function ($nome) use ($app) {
    $app['monolog']->addInfo(sprintf("Usuário '%s' entrou.", $nome));
    $app['monolog']->addDebug('Debug do código');
    $app['monolog']->addError('Ocorreu um erro');
    $app['monolog']->addWarning('Atenção');
    return 'Olá '.$app->escape($nome);
});

$app->run();