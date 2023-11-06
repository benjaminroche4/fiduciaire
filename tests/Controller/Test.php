<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class Test extends WebTestCase
{
    public function testHomeController()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testContactController()
    {
        $client = static::createClient();
        $client->request('GET', '/contact');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testDevenirClientController()
    {
        $client = static::createClient();
        $client->request('GET', '/devenir-client');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testServicesFiduciaireController()
    {
        $client = static::createClient();
        $client->request('GET', '/services-fiduciaire');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testAuditEtControlesController()
    {
        $client = static::createClient();
        $client->request('GET', '/audit-et-controles');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testAProposController()
    {
        $client = static::createClient();
        $client->request('GET', '/a-propos');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testControleRestreintController()
    {
        $client = static::createClient();
        $client->request('GET', '/audit-et-controles/controle-restreint');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testConseilEntrepriseController()
    {
        $client = static::createClient();
        $client->request('GET', '/conseil-entreprise');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testConnexionController()
    {
        $client = static::createClient();
        $client->request('GET', '/connexion');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testMentionsLegalesController()
    {
        $client = static::createClient();
        $client->request('GET', '/mentions-legales');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testDonneesPersonnellesController()
    {
        $client = static::createClient();
        $client->request('GET', '/donnees-personnelles');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
