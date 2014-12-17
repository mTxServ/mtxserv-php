<?php

if (!file_exists(dirname(__DIR__) . '/composer.lock')) {
    die("Dependencies must be installed using composer:\n\nphp composer.phar install\n\n"
        . "See http://getcomposer.org for help with installing composer\n");
}

$loader = require dirname(__DIR__) . '/vendor/autoload.php';
$loader->add('Mtxserv\\Test', __DIR__);

Guzzle\Tests\GuzzleTestCase::setMockBasePath(__DIR__ . '/Mock');
Guzzle\Tests\GuzzleTestCase::setServiceBuilder(Guzzle\Service\Builder\ServiceBuilder::factory(array(
    'mtxserv' => array(
        'class' => 'Mtxserv\Client',
        'params' => array(
            'client_id'     => 'client_id',
            'client_secret' => 'client_secret',
            'api_key'       => 'client_api_key'
        )
    )
)));
