<?php

    /**
     * Switches the array to dotted string and dotted string to array.
     * 
     * @author Abhishek Prakash <prakashabhishek6262@gmail.com>
     * @since  1.0
     * 
     * @param  mixed $arr
     * 
     * @return mixed
     */
    function dot($arr) {
        if (is_array($arr)) {
            return implode('.', $arr);
        }

        return explode('.', $arr);
    }

    function dot_value(string $key, array $arr, $default = '') {
        $keys = dot($key);

        foreach ($keys as $key) {
            if (is_array($arr)) {
                if (! array_key_exists($key, $arr)) {
                    return $default;
                }

                $arr = $arr[$key];
            }
        }

        return $arr;
    }

    /**
     * Return the configuration value according to the environment being
     * used by the application.
     * 
     * @author Abhishek Prakash <prakashabhishek6262@gmail.com>
     * @since  1.0
     * 
     * @param  string $key
     * @param  mixed  $default
     * 
     * @return mixed
     */
    function config(string $key, $default = '') {
        $config = require( INCLUDES_PATH  . '/config.php' );

        $environment = $config['environment'];
        $config      = $config[$environment];

        $value = dot_value($key, $config, null);

        if ($value === null) {
            return $default;
        }

        return $value;
    }

    /**
     * Returns a formatted page title.
     * 
     * @author Abhishek Prakash <prakashabhishek6262@gmail.com>
     * @since  1.0
     * 
     * @param string $title
     * 
     * @return string
     */
    function format_page_title(string $title) : string {
        return $title . " | " . config('site_title');
    }

    /**
     * Inlcudes the template file by the supplied name.
     * 
     * @author Abhishek Prakash <prakashabhishek6262@gmail.com>
     * @since  1.0
     * 
     * @param  string $name
     * @param  array $data
     * 
     * @return void
     */
    function template(string $name, array $data = []) {
        $name = dot($name);

        if ($name[0] === 'partial') {
            unset($name[0]);

            require_once( INCLUDES_PATH . '/templates/partials/' . dot($name) . '.php');
            return;
        }

        $name = implode('.', $name);
        require_once( INCLUDES_PATH . '/templates/' . $name . '.php');
    }