<?php

namespace Inc;

final class Init {

    /*
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services() {
        return [
            Pages\Admin::class,
            Base\Enqueue::class
        ];
    }

    /*
     * Loop through the classes, initialize them, and
     * call the register() method if it exists
     * @return
     */
    public static function register_services() {
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }

    /*
     * Initialize the class
     * @param class $class  class from the services array
     * @return class instance  new instance of the class
     */
    private static function instantiate( $class ) {
        return new $class();
    }
}

//use Inc\Activate;
//use Inc\Deactivate;
//use Inc\Pages\Admin;
//
//if( !class_exists('AnimatedPieCharts') ) {
//    class AnimatedPieCharts
//    {
//
//        public $plugin;
//
//        function __construct() {
//            $this->plugin = plugin_basename( __FILE__ );
//        }
//
//        function register_admin() {
//            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_admin' ) );
//
//            add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
//
//            add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
//        }
//
//        function settings_link( $links ) {
//            $settings_link = '<a href="admin.php?page=apc_charts_plugin">Settings</a>';
//            array_push( $links, $settings_link );
//            return $links;
//        }
//
//
//        function activate() {
//            $this->apc_custom_post_type();
//            Activate::activate();
//        }
//
//        function deactivate() {
//            Deactivate::deactivate();
//
//        }
//
//        protected function create_post_type() {
//            add_action('init', array($this, 'apc_custom_post_type') );
//        }
//
//        function apc_custom_post_type() {
//            register_post_type('apc_chart',
//                array(
//                    'labels'      => array(
//                        'name'          => __('Charts', 'animated-pie-charts'),
//                        'singular_name' => __('Chart', 'animated-pie-charts'),
//                    ),
//                    'public'      => true,
//                    'has_archive' => true,
//                )
//            );
//        }
//
//
//
//        function enqueue_admin(){
//            wp_enqueue_style('apc-admin-styles', plugins_url('/assets/apc-admin-style.css', __FILE__));
//        }
//
//    }
//}
//
//if( class_exists('AnimatedPieCharts') ) {
//    $animatedPieCharts = new AnimatedPieCharts();
//    $animatedPieCharts->register_admin();
//    $animatedPieCharts->register();
//
//    register_activation_hook( __FILE__, array( $animatedPieCharts, 'activate' ) );
//    register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate' ) );
//}