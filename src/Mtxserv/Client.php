<?php

namespace Mtxserv;

use Guzzle\Common\Collection;
use Guzzle\Service\Description\ServiceDescription;

/**
 * mTxServ Client
 */
class Client extends \Guzzle\Service\Client
{
    /**
     * {@inheritDoc}
     */
    public static function factory($config = array())
    {
        $defaults = array(
            'base_url'   => 'https://mtxserv.com/api/{version}/',
            'version'    => 'v1',
            'grant_type' => 'https://mtxserv.com/grants/api_key',
            'has_authentification' => true,
            'oauth2_token' => 'https://mtxserv.com/oauth/v2/token'
        );
        
        $required = array(
            'client_id',
            'client_secret',
            'api_key',
        );
        
        $config = Collection::fromConfig($config, $defaults, $required);
        $client = new self($config->get('base_url'), $config);
        
        // Set services descriptions
        $client->setDescription(ServiceDescription::factory(__DIR__ . '/Resources/product.php'));
        $client->setDescription(ServiceDescription::factory(__DIR__ . '/Resources/admin.php'));
        $client->setDescription(ServiceDescription::factory(__DIR__ . '/Resources/viewer.php'));
        $client->setDescription(ServiceDescription::factory(__DIR__ . '/Resources/game.php'));
        
        // Add authentification
        if ($config->get('has_authentification')) {
            $client->getEventDispatcher()->addListener('request.before_send', function(\Guzzle\Common\Event $event) use ($config) {
                $event['request']->getQuery()->set('access_token', Client::retrieveAccessToken($config));
            });
        }
        
        // Set user agent
        $client->setUserAgent('mTxServ SDK PHP');
        
        return $client;
    }
    
    /**
     * Retrieve access token
     * 
     * @param Collection $config
     * 
     * @return string
     */
    static protected function retrieveAccessToken(Collection $config)
    {
        $client = new \Guzzle\Http\Client($config->get('oauth2_token'));
        
        $request = $client->get();

        $query = $request->getQuery();

        $query->set('grant_type', $config->get('grant_type'));
        $query->set('client_id', $config->get('client_id'));
        $query->set('client_secret', $config->get('client_secret'));
        $query->set('api_key', $config->get('api_key'));

        try {
            $response = $request->send();
            $json = $response->json();
        } catch (\Guzzle\Http\Exception\BadResponseException $ex) {
            throw new \Exception('Bad authentification, please check your oauth settings');
        }

        return $json['access_token'];
    }
}
