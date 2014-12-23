<?php

namespace Mtxserv\Test;

use Mtxserv\Client;
use Guzzle\Tests\GuzzleTestCase;

/**
 * Client Test
 */
class ClientTest extends GuzzleTestCase
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
    
    public function testFactoryInitializesUserAgent()
    {
        $client = Client::factory(array(
            'client_id'     => 'CLIENT_ID',
            'client_secret' => 'CLIENT_SECRET',
            'api_key'       => 'API_KEY',
            'version'       => 'v1337'
        ));
        $request = $client->get();
        $this->assertEquals('mTxServ SDK PHP', (string) $request->getHeader('User-Agent'));
    }

}