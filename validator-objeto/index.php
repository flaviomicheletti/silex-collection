<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Usuario.php';

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();
$app['debug'] = true;
$app->register(new Silex\Provider\ValidatorServiceProvider());

$app->get('/', function () use ($app) {
    return ""
    . "<h1>Validator por objeto</h1>"
    . "<form action='validar-email/' method='POST'>"
        . "<p><label for='nome'>Nome: </label>"
        . "<input type='text' name='nome' id='nome' /></p>"
        . "<p><label for='email'>E-mail: </label>"
        . "<input type='text' name='email' id='email' /></p>"
        . "<p><input type='submit' value='Enviar' /></p>"
    . "</form>";
});

$app->post('/validar-email/', function (Request $request) use ($app) {
    $usuario = new Usuario();
    $usuario->nome  = $request->get('nome');
    $usuario->email = $request->get('email');

    $errors = $app['validator']->validate($usuario);

    if (count($errors) > 0) {
        echo '<h2>Formulário inválido</h2>';
        foreach ($errors as $error) {
            echo $error->getPropertyPath().' '.$error->getMessage()."<br>";
        }
    } else {
        echo '<h2>Formulário válido</h2>';
    }
    return "";
});

$app->run();