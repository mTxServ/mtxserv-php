<?php

namespace Mtxserv;

use Guzzle\Common\Collection;

/**
 * mTxServ Client
 */
class Client extends \Guzzle\Service\Client
{
    public static function factory($config = array())
    {
        $defaults = array(
            'base_url'      => 'https://www.mtxserv.fr/api/{version}/',
            'version'       => 'v1',
            'grant_type'    => 'https://www.mtxserv.fr/grants/api_key',
        );
        
        $required = array(
            'client_id',
            'client_secret',
            'api_key'
        );
        
        $config = Collection::fromConfig($config, $defaults, $required);
        $client = new self($config->get('base_url'), $config);
        
        $client->setUserAgent(sprintf('mTxServ SDK (%s)', $config['version']));
        
        return $client;
    }
}
