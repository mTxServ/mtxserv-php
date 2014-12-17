<?php

namespace Mtxserv\Test;

use Mtxserv\Client;

/**
 * Client Test
 */
class ClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryInitializesClient()
    {
        $client = Client::factory(array(
            'client_id'     => 'CLIENT_ID',
            'client_secret' => 'CLIENT_SECRET',
            'api_key'       => 'API_KEY',
            'version'       => 'v1337'
        ));
        
        $this->assertEquals('https://www.mtxserv.fr/api/v1337/', $client->getBaseUrl());
    }

//    public function testGetProducts()
//    {
//        $client = $this->getServiceBuilder()->get('mtxserv');
//        $this->setMockResponse($client, array(
//            'get_products'
//        ));
//        $response = $client->getProducts();
//        
//        $this->assertInternalType('array', $response);
//        $this->assertSame(52975, $response[0]['id']);
//    }
}