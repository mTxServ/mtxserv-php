# mTxServ SDK for PHP

[![Build Status](https://travis-ci.org/mTxServ/mtxserv-php.svg)](https://travis-ci.org/mTxServ/mtxserv-php)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c34a7b35-4acc-4d1b-940f-7f16c59bc713/mini.png)](https://insight.sensiolabs.com/projects/c34a7b35-4acc-4d1b-940f-7f16c59bc713)

The **mTxServ SDK for PHP** enables PHP developers to easily integrate [our API][mtxapi] into your applications.

**NOTE**: This library is under heavy development and a lot of calls haven't been implemented yet. We're looking forward to any of your PR's.

## Installation
We recommend Composer for managing dependencies. Installing is as easy as:

    $ php composer.phar require "mtxserv/mtxserv-php:1.0.*@dev"

### Authorization with OAuth

```php
<?php

$client = \Mtxserv\Client::factory(array(
    'client_id'     => 'YOUR_CLIENT_ID',
    'client_secret' => 'YOUR_CLIENT_SECRET',
    'api_key'       => 'YOUR_API_KEY'
));
```

### Get products

```php
<?php

$client = \Mtxserv\Client::factory(array(
    'client_id'     => 'YOUR_CLIENT_ID',
    'client_secret' => 'YOUR_CLIENT_SECRET',
    'api_key'       => 'YOUR_API_KEY'
));

$products = $client->getProducts(); 
var_dump($products);
```

### Get product

```php
<?php

$client = \Mtxserv\Client::factory(array(
    'client_id'     => 'YOUR_CLIENT_ID',
    'client_secret' => 'YOUR_CLIENT_SECRET',
    'api_key'       => 'YOUR_API_KEY'
));

$product = $client->getProduct(array(
    'id' => 1337 # required (productId)
)); 
var_dump($product);
```

### Get admins

```php
<?php

$client = \Mtxserv\Client::factory(array(
    'client_id'     => 'YOUR_CLIENT_ID',
    'client_secret' => 'YOUR_CLIENT_SECRET',
    'api_key'       => 'YOUR_API_KEY'
));

$administrators = $client->getAdmins(array(
    'id' => 1337 # required (productId)
)); 
var_dump($administrators);
```

<!--- END API -->

[mtxapi]: https://www.mtxserv.fr/mtxserv-api
