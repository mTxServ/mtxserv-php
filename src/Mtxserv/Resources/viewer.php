<?php

return array(
    'name'        => 'mTxServ API Viewer',

    'operations'  => array(
        'getGameViewer' => array(
            'httpMethod' => 'GET',
            'uri'        => 'viewers/game',
            'summary'    => 'Get status of a game server',
            'parameters' => array(
                'type' => array(
                    'location'    => 'query',
                    'description' => 'Game Type',
                    'type'        => 'string',
                    'required'    => true
                ),
                'ip' => array(
                    'location'    => 'query',
                    'description' => 'IP',
                    'type'        => 'string',
                    'required'    => true
                ),
                'port' => array(
                    'location'    => 'query',
                    'description' => 'Port',
                    'type'        => 'integer',
                    'required'    => true
                )
            )
        ),
    )
);
