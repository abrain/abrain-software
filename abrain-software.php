<?php
namespace abrain\abrainsoftware;

/*
Plugin Name: abrain Software
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Kleines Helferlein für abrain.de
Version: 0.1.0
Author: Andreas Brain
Author URI: https://www.abrain.de
License: GPL2
*/

class Main {
    private static $pluginDir;
    private static $pluginUrl;

    public function __construct()
    {
        self::$pluginDir = plugin_dir_path(__FILE__);
        self::$pluginUrl = plugin_dir_url(__FILE__);

        $this->addHooks();
    }

    private function addHooks()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueueStyleAndScripts'));
        add_action('admin_enqueue_scripts', array($this, 'enqueueStyleAndScripts'));
    }

    public function enqueueStyleAndScripts()
    {
        wp_enqueue_style(
            'font-awesome',
            self::$pluginUrl . 'font-awesome/css/font-awesome.min.css',
            false,
            '4.1.0'
        );

        wp_enqueue_style(
            'abrain-software',
            self::$pluginUrl . 'style.css',
            false,
            '0.1.0'
        );
    }
}

new Main();
