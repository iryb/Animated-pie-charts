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

// Require once the Composer Autoload
if(file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' )) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Define constants
define ( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define ( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define ( 'PLUGIN', plugin_basename( __FILE__ ) );

use Inc\Base\Activate;
use Inc\Base\Deactivate;

/*
 * The code that runs during plugin activation
 */
function activate_apc_charts_plugin() {
    Activate::activate();
}

/*
 * The code that runs during plugin deactivation
 */
function deactivate_apc_charts_plugin() {
    Deactivate::deactivate();
}

register_activation_hook( __FILE__, 'activate_apc_charts_plugin');
register_deactivation_hook( __FILE__, 'deactivate_apc_charts_plugin');

/*
 * Initialize all the core classes of the plugin
 */
if( class_exists('Inc\\Init') ) {
    Inc\Init::register_services();
}