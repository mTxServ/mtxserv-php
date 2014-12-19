<?php

namespace Mtxserv\Test;

use Guzzle\Tests\GuzzleTestCase;

/**
 * Product Test
 */
class ProductTest extends GuzzleTestCase
{
    public function testGetProducts()
    {
        $client = $this->getServiceBuilder()->get('mtxserv');
        $this->setMockResponse($client, array(
            'product/get_products'
        ));
        $response = $client->getProducts();
        
        $this->assertInternalType('array', $response);
        $this->assertSame(52975, $response[0]['id']);
    }

    public function testGetProduct()
    {
        $client = $this->getServiceBuilder()->get('mtxserv');
        $this->setMockResponse($client, array(
            'product/get_product'
        ));
        $response = $client->getProduct(array(
            'id' => 52975
        ));
        
        $this->assertInternalType('array', $response);
        $this->assertSame(52975, $response['id']);
    }
}