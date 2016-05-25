<?php

namespace Acme;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Foo
{
    public function bar(Request $request, Application $app)
    {
        return new Response("Foi", 201);
    }
}
