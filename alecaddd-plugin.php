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


if (!defined('ABSPATH')) {
    die();
}

if (file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}
define('PLUGIN_PATH',plugin_dir_path(__FILE__));
if (class_exists('Inc\Init')){
    Inc\Init::register_services(plugin_basename(__FILE__));
}
