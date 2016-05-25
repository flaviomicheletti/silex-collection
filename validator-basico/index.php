<?php

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\Validator\Constraints as Assert;

$app = new Silex\Application();
$app->register(new Silex\Provider\ValidatorServiceProvider());

$app->get('/', function () use ($app) {
    return "<h1>Validator Básico</h1><p>Insira um endereço de e-mail na url.</p>";
});

$app->get('/{email}/', function ($email) use ($app) {
    $errors = $app['validator']->validate($email, new Assert\Email());

    if (count($errors) > 0) {
        return (string) $errors;
    } else {
        return 'Endereço de e-mail válido';
    }
});

$app->run();