<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://malok.pl
 * @since             1.0.0
 * @package           Wbldr_Zooming
 *
 * @wordpress-plugin
 * Plugin Name:       wbldr Zooming
 * Description:       zooming
 * Version:           1.0.0
 * Author:            Paweł Malok
 * Author URI:        http://malok.pl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wbldr-zooming
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wbldr-zooming-activator.php
 */
function activate_wbldr_zooming() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wbldr-zooming-activator.php';
	Wbldr_Zooming_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wbldr-zooming-deactivator.php
 */
function deactivate_wbldr_zooming() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wbldr-zooming-deactivator.php';
	Wbldr_Zooming_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wbldr_zooming' );
register_deactivation_hook( __FILE__, 'deactivate_wbldr_zooming' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wbldr-zooming.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wbldr_zooming() {

	$plugin = new Wbldr_Zooming();
	$plugin->run();

}
run_wbldr_zooming();
