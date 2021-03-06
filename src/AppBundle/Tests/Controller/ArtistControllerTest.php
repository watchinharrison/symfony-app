<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArtistControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/artists');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/artist');
    }

}
