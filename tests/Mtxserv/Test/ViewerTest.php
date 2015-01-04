<?php

namespace Mtxserv\Test;

use Guzzle\Tests\GuzzleTestCase;

class ViewerTest extends GuzzleTestCase
{
    public function testGetGameViewer()
    {
        $client = $this->getServiceBuilder()->get('mtxserv');
        $this->setMockResponse($client, array(
            'viewer/get_game_viewer'
        ));
        $response = $client->getGameViewer(array(
            'type' => 'minecraft',
            'ip'   => 'sandbox03.mtxserv.fr',
            'port' => 27030
        ));

        $this->assertInternalType('array', $response);
        $this->assertSame(true, $response['is_online']);
        $this->assertSame('sandbox03.mtxserv.fr', $response['ip']);
        $this->assertSame('27030', $response['port']);
        $this->assertSame('minecraft', $response['game']);
    }
}
