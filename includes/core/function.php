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
        $config = require_once( INCLUDES_PATH  . '/config.php');

        $environment = $config['environment'];
        $config      = $config[$environment];

        $setting = dot($name);

        // foreach($setting as $key) {
        //     if (is_array($config)) {
        //         if (! array_key_exists($key, $config)) {
        //             return $default_value;
        //         }
    
        //         $config = $config[$key];
        //     }
        // }

        // if ($config === null) {
        //     return $default_value;
        // }

        return 'QuesPaperBank';
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