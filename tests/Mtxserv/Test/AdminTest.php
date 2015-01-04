<?php

namespace Mtxserv\Test;

use Guzzle\Tests\GuzzleTestCase;

/**
 * Admin Test
 */
class AdminTest extends GuzzleTestCase
{
    public function testGetAdmins()
    {
        $client = $this->getServiceBuilder()->get('mtxserv');
        $this->setMockResponse($client, array(
            'admin/get_admins'
        ));
        $response = $client->getAdmins(array(
            'id' => 54415
        ));

        $this->assertInternalType('array', $response);
        $this->assertSame(9204, $response[0]['id']);
        $this->assertSame(54415, $response[0]['invoice_id']);
    }
}
