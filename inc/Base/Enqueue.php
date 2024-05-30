<?php
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

/**
 * Enqueue class to handle script and style enqueues
 */
class Enqueue extends BaseController
{
    public function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    public function enqueue() {
        error_log('Enqueue method called');
        wp_enqueue_style( 'mypluginstyle', $this->plugin_url . 'assets/style.css' );
        wp_enqueue_script( 'mypluginscript', $this->plugin_url . 'assets/index.js' );
    }
}
