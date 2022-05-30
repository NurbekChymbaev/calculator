<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorControllerTest extends WebTestCase
{
    public function testGetIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/calculator');
        $this->assertResponseIsSuccessful();
    }

    public function testPostIndex()
    {
        $client = static::createClient();
        $client->request('POST', '/calculator');
        $this->assertResponseIsSuccessful();
    }
}