<?php

namespace Mtxserv;

use CommerceGuys\Guzzle\Plugin\Oauth2\Oauth2Plugin;
use CommerceGuys\Guzzle\Plugin\Oauth2\GrantType\PasswordCredentials;
use CommerceGuys\Guzzle\Plugin\Oauth2\GrantType\RefreshToken;
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
            'base_url'   => 'https://www.mtxserv.fr/api/{version}/',
            'version'    => 'v1',
            'grant_type' => 'https://www.mtxserv.fr/grants/api_key',
        );
        
        $required = array(
            'client_id',
            'client_secret',
            'api_key',
        );
        
        $config = Collection::fromConfig($config, $defaults, $required);
        $client = new self($config->get('base_url'), $config);
        
        $accessToken = Client::retrieveAccessToken($config);
        
        // Set service description
        $serviceDescription = ServiceDescription::factory(__DIR__ . '/Resources/service.php');
        $client->setDescription($serviceDescription);
        
        // Add authentification
        $client->getEventDispatcher()->addListener('request.before_send', function(\Guzzle\Common\Event $event) use ($accessToken) {
            $event['request']->getQuery()->set('access_token', $accessToken);
        });
        
        // Set user agent
        $client->setUserAgent(sprintf('mTxServ SDK (%s)', $config['version']));
        
        return $client;
    }
    
    /**
     * Retrieve access token
     * 
     * @param Guzzle\Common\Collection $config
     * 
     * @return string
     */
    static protected function retrieveAccessToken(Collection $config)
    {
        $client = new \Guzzle\Http\Client('https://www.mtxserv.fr/oauth/v2/token');
        
        $request = $client->get();

        $query = $request->getQuery();

        $query->set('grant_type', $config->get('grant_type'));
        $query->set('client_id', $config->get('client_id'));
        $query->set('client_secret', $config->get('client_secret'));
        $query->set('api_key', $config->get('api_key'));
        
        $response = $request->send();
        $json = $response->json();
        
        return $json['access_token'];
    }
}
