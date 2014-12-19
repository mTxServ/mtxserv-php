<?php

return array(
    'name'        => 'mTxServ API Admin',
    
    'operations'  => array(
        'getAdmins' => array(
            'httpMethod' => 'GET',
            'uri'        => 'admins/{id}',
            'summary'    => 'Get administrators of a product',
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
