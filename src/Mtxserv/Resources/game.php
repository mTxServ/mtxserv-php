<?php

return array(
    'name'        => 'mTxServ API Game',

    'operations'  => array(
        'gameActionReboot' => array(
            'httpMethod' => 'POST',
            'uri'        => 'game/{gameServerId}/actions/restart',
            'summary'    => 'Restart a gameserver',
             'parameters' => array(
                'gameServerId' => array(
                    'location'    => 'uri',
                    'description' => 'GameServer ID',
                    'type'        => 'integer',
                    'required'    => true
                )
            )
        ),
        'gameActionStop' => array(
            'httpMethod' => 'POST',
            'uri'        => 'game/{gameServerId}/actions/stop',
            'summary'    => 'Stop a gameserver',
             'parameters' => array(
                'gameServerId' => array(
                    'location'    => 'uri',
                    'description' => 'GameServer ID',
                    'type'        => 'integer',
                    'required'    => true
                )
            )
        ),
    )
);
