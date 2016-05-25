Validator por objeto (classe)
===

http://symfony.com/doc/master/book/validation.html

## Utilização

Registre o serviço Validator do Symphony:

    $app->register(new Silex\Provider\ValidatorServiceProvider());

Carregue o módulo necessário para validar:

    use Symfony\Component\Validator\Constraints as Assert;
    use Symfony\Component\Validator\Mapping\ClassMetadata;

Na classe adicione a função abaixo para validar os atributos da classe:

    static public function loadValidatorMetadata(ClassMetadata $metadata) {
        $metadata->addPropertyConstraint('nome', new Assert\Length(array('min' => 4)));
        $metadata->addPropertyConstraint('nome', new Assert\NotBlank());
        $metadata->addPropertyConstraint('email', new Assert\NotBlank());
        $metadata->addPropertyConstraint('email', new Assert\Email());
    }

No controller carregue o serviço Request

    use Symfony\Component\HttpFoundation\Request;

Instancie a classe que será validada

    $usuario = new Usuario();
    $usuario->nome  = $request->get('nome');
    $usuario->email = $request->get('email');

Valide a classe

    $errors = $app['validator']->validate($usuario);

E Verifique se validou todos os campos, se caso houver algum erro mostra o campo e a mensagem do erro,
por padrão a mensagem é exibida em inglês.

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo $error->getPropertyPath().' '.$error->getMessage()."<br>";
        }
    } else {
        echo 'The author is valid';
    }