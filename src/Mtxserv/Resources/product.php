<?php

return array(
    'name'        => 'mTxServ API Product',

    'operations'  => array(
        'getProducts' => array(
            'httpMethod' => 'GET',
            'uri'        => 'invoices',
            'summary'    => 'Get products list',
        ),
        'getProduct' => array(
            'httpMethod' => 'GET',
            'uri'        => 'invoices/{id}',
            'summary'    => 'Get a product',
            'parameters' => array(
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Invoice ID',
                    'type'        => 'integer',
                    'required'    => true
                )
            )
        ),
    )
);
