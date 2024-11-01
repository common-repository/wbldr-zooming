<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://malok.pl
 * @since      1.0.0
 *
 * @package    Wbldr_Zooming
 * @subpackage Wbldr_Zooming/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wbldr_Zooming
 * @subpackage Wbldr_Zooming/includes
 * @author     Paweł Malok <pawel@malok.pl>
 */
class Wbldr_Zooming_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wbldr-zooming',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
