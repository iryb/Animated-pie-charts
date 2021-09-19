<?php
namespace Inc\Base;

class Enqueue {
    public function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    function enqueue() {
        wp_enqueue_style( 'apc-styles', PLUGIN_URL . 'assets/style.css' );
        wp_enqueue_script( 'apc-script', PLUGIN_URL . 'assets/scripts.js' );
    }
}