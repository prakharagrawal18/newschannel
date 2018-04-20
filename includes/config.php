<?php

    /**
     * Set the details according to the environment in which the
     * application is being used.
     * 
     * @var array
     */
    return [
        'environment' => 'development', // The current environment being used in the application.

        'development' => [
            'site_title' => 'QuesPaperBank',
            'database'   => [
                'host'     => 'localhost',
                'name'     => 'newschannel',
                'password' => '',
                'username' => 'root'
            ]
        ],

        'production' => [
            'site_title' => 'QuesPaperBank',
            'database'   => [
                'host'     => '',
                'name'     => '',
                'password' => '',
                'username' => ''
            ]
        ]
    ];