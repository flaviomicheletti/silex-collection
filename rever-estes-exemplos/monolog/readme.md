Monolog
===

http://silex.sensiolabs.org/doc/1.3/providers/monolog.html

Registre o serviço do Monolog e define o local do arquivo de log. configure.

    $app->register(new Silex\Provider\MonologServiceProvider(), array(
        'monolog.logfile' => __DIR__.'/desenvolvimento.log',
    ));


Adicione as configurações do Monolog conforme a sua necessidade. O `monolog.level` define qual tipo de log
deve ser registrado.

    'monolog.name'    => "app",
    'monolog.level'   => "DEBUG" // "DEBUG", "INFO", "WARNING", "ERROR"


Crie o arquivo `desenvolvimento.log` no diretório definido e define sua permissão para escrita e leitura.


Para adicionar um registro no log:

    $app['monolog']->addInfo(sprintf("Usuário '%s' entrou.", $nome));


Podemos especificar qual o tipo do log que será registrado;

    $app['monolog']->addDebug('Debug do código');
    $app['monolog']->addError('Ocorreu um erro');
    $app['monolog']->addWarning('Atenção');
