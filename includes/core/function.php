<?php

    /**
     * Returns the dotted string in the array format.
     * 
     * @author Prakhar Agrawal <prakhara960@gmail.com>
     * @since  1.0
     * 
     * @param  string $name
     * 
     * @return array
     */
    function dot_to_array(string $setting) : array {
        return explode('.', $setting);
    }

    /**
     * Return the configuration value according to the environment being
     * used by the application.
     * 
     * @author Abhishek Prakash <prakashabhishek6262@gmail.com>
     * @since  1.0
     * 
     * @param  string $name
     * @param  mixed  $default_value
     * 
     * @return string
     */
    function config(string $name, $default_value = '') : string {
        $config = require_once( __DIR__ . './../config.php');

        $environment = $config['environment'];
        $config      = $config[$environment];

        $setting = dot_to_array($name);

        foreach($setting as $key) {
            if (! array_key_exists($key, $config)) {
                return $default_value;
            }
            
            $config = $config[$key];
        }

        return $config;
    }