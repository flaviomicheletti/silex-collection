Validator básico
===

http://silex.sensiolabs.org/doc/master/providers/validator.html

## Utilização

Registre o serviço Validator do Symphony:

    $app->register(new Silex\Provider\ValidatorServiceProvider());

Carregue o módulo necessário para validar:

    use Symfony\Component\Validator\Constraints as Assert;

Crie a variável irá validar o campo:

    $errors = $app['validator']->validate($email, new Assert\Email());

Verifique se foi encontrado algum campo inválido, caso houver retorna os campos inválido:

    if (count($errors) > 0) {
        return (string) $errors;
    } else {
        return 'Endereço de e-mail válido';
    }