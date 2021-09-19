<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController {
    public $settings;

    public function __construct()
    {
        $this->settings = new SettingsApi();
    }

    public function register()
    {
        $pages = [
            [
                'page_title' => 'Animated Pie Charts',
                'menu_title' => 'Charts',
                'capability' => 'manage_options',
                'menu_slug'  => 'apc_charts_plugin',
                'callback'   => function() {echo '<h1>Plugin</h1>'; },
                'icon_url'   => 'dashicons-store',
                'position'   => 110
            ]
        ];
        $this->settings->addPages( $pages )->register();
    }

//    function add_admin_pages()
//    {
//        add_menu_page( 'Animated Pie Charts', 'Charts', 'manage_options', 'apc_charts_plugin', array($this, 'admin_index'), 'dashicons-store', 110 );
//    }
//
//    function admin_index()
//    {
//        require_once $this->plugin_path . 'templates/admin.php';
//    }

}