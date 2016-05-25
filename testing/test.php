<?php

require_once __DIR__ . '/vendor/autoload.php';

use Silex\WebTestCase;

class ContactFormTest extends WebTestCase {

    public function createApplication() {
        $app = require __DIR__ . '/index.php';
        $app['debug'] = true;
        unset($app['exception_handler']);

        return $app;
    }

    public function testInitialPage() {
        $client  = $this->createClient();
        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isOk());
        // $this->assertCount(1, $crawler->filter('h1:contains("Contact us")'));
        // $this->assertCount(1, $crawler->filter('form'));
    }

}
