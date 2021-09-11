<?php
/**
 * Trigger this file on Plugin uninstall
 */

if( !defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

//Clear custom database table
global $wpdb;

$wpdb->guery( "DELETE FROM wp_posts WHERE post_type = 'apc_chart'" );
$wpdb->guery( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts )" );