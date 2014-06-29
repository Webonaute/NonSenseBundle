<?php

namespace Webonaute\NonSenseBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IndexControllerTest extends WebTestCase
{
    public function testDisplaysentence()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'sentence');
    }

    public function testDisplayword()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'word');
    }

}
