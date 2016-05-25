Assets
===

Disponível a partir da versão 2.0 do Silex.

Registre o serviço Asset e configure o path das pastas que serão utilizadas:

    $app->register(new Silex\Provider\AssetServiceProvider(), array(
        'assets.version' => 'v1',
        'assets.version_format' => '%s?version=%s',
        'assets.named_packages' => array(
            'css' => array('version' => 'css3', 'base_path' => '/css'),
            'images' => array('base_path' => '/imagens'),
        ),
    ));

Para carregar os arquivos no template basta utilizar a função asset('nome-do-arquivo', 'nome-do-packaged'):

    <link type="text/css" rel="stylesheet" href="{{ asset('/style.css', 'css') }}" />
    <img src="{{ asset('/foo.png', 'images') }}">