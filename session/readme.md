Session
===

http://silex.sensiolabs.org/doc/1.3/providers/session.html

Registre o serviço da session na aplicação.

    $app->register(new Silex\Provider\SessionServiceProvider());

Para inserir um registro:

    $app['session']->set('usuario', array('nome' => "Lucas"));

Para recuperar um registro:

    $usuario = $app['session']->get('usuario');

Para remover um registro:

    $app['session']->remove('carro');

Para limpar a session:

    $app['session']->clear();

Para atribuir um valor padrão para o registro:

    $usuario = $app['session']->get('usuario', array('nome' => "Não informado"));