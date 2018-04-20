<?php

    /**
     * Set the details according to the environment in which the
     * application is being used.
     * 
     * @var array
     */
    return [
        'environment' => 'development',
        
        'development' => [
            'site_title' => 'News Channel',
            'database'   => [
                'host'     => '',
                'name'     => '',
                'password' => '',
                'username' => ''
            ]
        ],

        'production' => [
            'site_title' => 'News Channel',
            'database'   => [
                'host'     => 'localhost',
                'name'     => 'newschannel',
                'password' => '',
                'username' => 'root'
            ]
        ]
    ];