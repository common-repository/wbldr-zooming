<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://malok.pl
 * @since      1.0.0
 *
 * @package    Wbldr_Zooming
 * @subpackage Wbldr_Zooming/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wbldr_Zooming
 * @subpackage Wbldr_Zooming/public
 * @author     Paweł Malok <pawel@malok.pl>
 */
class Wbldr_Zooming_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->wbldr_zooming_options = get_option( $this->plugin_name );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wbldr_Zooming_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wbldr_Zooming_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/magnific-popup.css', array(), '1.1.0', 'all' );

		$background = $this->wbldr_zooming_options['background'];
		$speed = $this->wbldr_zooming_options['speed'];
		$animation = $this->wbldr_zooming_options['animation'];
		wp_add_inline_style(
			$this->plugin_name,
				'.mfp-bg {
					background: ' . $background . '!important;
				}
				.mfp-fade.mfp-bg,
				.mfp-fade.mfp-wrap .mfp-content {
					-webkit-transition: all ' . $speed . 'ms ' . $animation . '!important;
					   -moz-transition: all ' . $speed . 'ms ' . $animation . '!important;
					        transition: all ' . $speed . 'ms ' . $animation . '!important;
				}'
		);

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wbldr_Zooming_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wbldr_Zooming_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_script( 'tb', '//cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js', array('jquery'), '1.1', true );
		wp_enqueue_script( 'magnific-popup', plugin_dir_url( __FILE__ ) . 'js/magnific-popup.min.js', array('jquery'), '1.1.0', true );
		// wp_enqueue_script( $this->plugin_name . '-src', plugin_dir_url( __FILE__ ) . 'js/jquery.fluidbox.min.js', array('jquery', 'jquery-throttle-debounce-plugin'), $this->version, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wbldr-zooming-public.js', array('magnific-popup'), $this->version, true );

		// $size = $this->wbldr_zooming_options["size"];
		// $viewportFill = ( $size ) ? 'viewportFill: ' . $size / 100 . ',' : '';

// wp_add_inline_script( $this->plugin_name . '-src', '(function($) {$(function() {$("a").fluidbox({' . $viewportFill . '});});})(jQuery);' );

		$zooming_settings = array(
			'speed' 	 => $this->wbldr_zooming_options['speed'],
			'animation'  => $this->wbldr_zooming_options['animation'],
			'background' => $this->wbldr_zooming_options['background'],
			'onclick' 	 => $this->wbldr_zooming_options['onclick'],
            'gallery' 	 => $this->wbldr_zooming_options['gallery'],
            'filename'   => $this->wbldr_zooming_options['filename']
		);
		wp_localize_script( $this->plugin_name, 'zooming_settings', $zooming_settings );
	}

}
