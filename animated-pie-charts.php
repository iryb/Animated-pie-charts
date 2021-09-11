<?php
/*
 * Plugin Name: Animated Pie Charts
 * Description:       Create animated pie charts.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Irina Burianovata
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       animated-pie-charts
 */
/*
Animated Pie Charts is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Animated Pie Charts is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Animated Pie Charts. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

defined('ABSPATH') or die('You can\t access this file.');

if( !class_exists('AnimatedPieCharts') ) {
    class AnimatedPieCharts
    {
//        function __construct() {
//            $this->create_post_type();
//        }

        static function register_admin() {
            add_action( 'wp_enqueue_scripts', array( 'AnimatedPieCharts', 'enqueue_admin' ) );
        }

        static function register() {
            add_action( 'wp_enqueue_scripts', array( 'AnimatedPieCharts', 'enqueue' ) );
        }

        function activate() {
            require_once plugin_dir_path( __FILE__ ) . 'inc/animated-pie-charts-activate.php';
            $this->apc_custom_post_type();
            AnimatedPieChartsActivate::activate();
        }

        function deactivate() {
            require_once plugin_dir_path( __FILE__ ) . 'inc/animated-pie-charts-deactivate.php';
            AnimatedPieChartsDeactivate::deactivate();

        }

        protected function create_post_type() {
            add_action('init', array($this, 'apc_custom_post_type') );
        }

        function apc_custom_post_type() {
            register_post_type('apc_chart',
                array(
                    'labels'      => array(
                        'name'          => __('Charts', 'animated-pie-charts'),
                        'singular_name' => __('Chart', 'animated-pie-charts'),
                    ),
                    'public'      => true,
                    'has_archive' => true,
                )
            );
        }

        function enqueue() {
            wp_enqueue_style( 'apc-styles', plugins_url( '/assets/style.css', __FILE__ ) );
            wp_enqueue_script( 'apc-script', plugins_url( '/assets/scripts.js', __FILE__ ) );
        }

        function enqueue_admin(){
            wp_enqueue_style('apc-admin-styles', plugins_url('/assets/apc-admin-style.css', __FILE__));
        }

    }
}

if( class_exists('AnimatedPieCharts') ) {
    $animatedPieCharts = new AnimatedPieCharts();
    $animatedPieCharts->register_admin();
    $animatedPieCharts->register();

    register_activation_hook( __FILE__, array( $animatedPieCharts, 'activate' ) );
    register_deactivation_hook( __FILE__, array( $animatedPieCharts, 'deactivate' ) );
}