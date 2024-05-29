<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Pages;

class Admin
{
    private $plugin;

    function __construct($plugin)
    {
        $this->plugin = $plugin;
    }

    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        add_action('init', array($this, 'custom_post_type'));
        add_action('admin_menu', array($this, 'add_admin_pages'));
        add_filter("plugin_action_links_$this->plugin", array($this, 'setting_links'));
    }

    public function setting_links($links)
    {
        $setting_link = '<a href="admin.php?page=alecaddd_page">Settings</a>';
        array_push($links, $setting_link);
        return $links;
    }

    public function add_admin_pages()
    {
        add_menu_page('Alecaddd Plugin', 'Alecaddd', 'manage_options', 'alecaddd_page', array($this, 'admin_index'), 'dashicons-store', 110);
    }

    public function admin_index()
    {
        require_once PLUGIN_PATH . 'templates/admin.php';
    }
   public  function custom_post_type() {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }
     public function enqueue() {
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/index.js', __FILE__));
    }
}
