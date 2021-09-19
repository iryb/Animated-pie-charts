<?php


namespace Inc\Pages;


class Admin
{
    public function register() {
        add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
    }

    function add_admin_pages() {
        add_menu_page( 'Animated Pie Charts', 'Charts', 'manage_options', 'apc_charts_plugin', array($this, 'admin_index'), 'dashicons-store', 110 );
    }

    function admin_index() {
        require_once PLUGIN_PATH . 'templates/admin.php';
    }

}