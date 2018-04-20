<?php

    define( "INCLUDES_PATH", __DIR__ );

    /**
     * Config file should be the first to include since this will be used
     * in the complete application for fetching the environment
     * configuration.
     */
    require_once( __DIR__ . '/core/function.php');
    require_once( __DIR__ . '/core/class-view.php');