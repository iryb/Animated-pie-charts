<?php

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController {
    public $settings;

    public $callbacks;

    public $pages;

    public $subpages;

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->settings->addPages( $this->pages )->withSubPage()->addSubPages( $this->subpages )->register();
    }

    public function setPages() {
        $this->pages = [
            [
                'page_title' => 'Animated Pie Charts',
                'menu_title' => 'Charts',
                'capability' => 'manage_options',
                'menu_slug'  => 'apc_charts_plugin',
                'callback'   => array( $this->callbacks, 'adminDashboard'),
                'icon_url'   => 'dashicons-store',
                'position'   => 110
            ]
        ];
    }

    public function setSubPages() {
        $this->subpages = [
            [
                'parent_slug' => 'apc_charts_plugin',
                'page_title'  => 'Settings',
                'menu_title'  => 'Settings',
                'capability'  => 'manage_options',
                'menu_slug'   => 'apc_settings',
                'callback'    => array( $this->callbacks, 'adminSettings')
            ]
        ];
    }

}