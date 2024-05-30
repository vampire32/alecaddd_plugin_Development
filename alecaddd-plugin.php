<?php
/**
 * @package AlecadddPlugin
 */
/*
Plugin Name: Alecaddd Plugin
Plugin URI: https://abdulmoiz-portfolio.netlify.app
Description: This is my first custom plugin.
Version: 1.0.0
Author: Abdul Moiz
Author URI: https://abdulmoiz-portfolio.netlify.app
License: GPLv2 or later
Text Domain: alecaddd-plugin
 */

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

if (file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

use Inc\Base\Activate;
use Inc\Base\Deactivate;

/**
 * The code that runs during plugin activation
 */
function activate_alecaddd_plugin() {
    Activate::activate();
}

/**
 * The code that runs during plugin deactivation
 */
function deactivate_alecaddd_plugin() {
    Deactivate::deactivate();
}

register_activation_hook( __FILE__, 'activate_alecaddd_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_alecaddd_plugin' );

if (class_exists('Inc\\Init')){
    Inc\Init::register_services();
}
