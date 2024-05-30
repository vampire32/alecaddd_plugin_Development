<?php

/**
 * @package AlecadddPlugin
 */
/** */
namespace Inc\Base;
class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        $default = array();

        update_option( 'alecaddd_plugin', $default );
    }
}
