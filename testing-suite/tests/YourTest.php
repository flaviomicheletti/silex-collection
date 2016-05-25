<?php

namespace YourApp\tests;

require_once __DIR__ . '/../vendor/autoload.php';

use Silex\WebTestCase;

class YourTest extends WebTestCase {

    public function createApplication() {
        $app = require __DIR__ . '/../index.php';
        $app['debug'] = true;
        unset($app['exception_handler']);
        return $app;
    }

    public function testFooBar() {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');
    }

}
