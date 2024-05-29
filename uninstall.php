<?php
/**
 * Trigger this file on Plugin uninstall
 *
 * @package AlecadddPlugin
 */

if (!define('WP_UNINSTALL_PLUGIN')){
    die();
}

$post=get_post(array('post_type'=>'book','numberposts'=>-1));

foreach ($post as $data){
    wp_delete_post($data->ID,true);
}