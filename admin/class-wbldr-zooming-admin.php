<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://malok.pl
 * @since      1.0.0
 *
 * @package    Wbldr_Zooming
 * @subpackage Wbldr_Zooming/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wbldr_Zooming
 * @subpackage Wbldr_Zooming/admin
 * @author     Paweł Malok <pawel@malok.pl>
 */
class Wbldr_Zooming_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->wbldr_zooming_options = get_option( $this->plugin_name );
	}

	/**
	 * Register the stylesheets for the admin area.
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
		wp_enqueue_style( 'spectrum', plugin_dir_url( __FILE__ ) . 'css/nouislider.min.css', array(), '1.8.0', 'all' );
		wp_enqueue_style( 'nouislider', plugin_dir_url( __FILE__ ) . 'css/spectrum.css', array(), '1.8.0', 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wbldr-zooming-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
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
		wp_enqueue_script( 'spectrum', plugin_dir_url( __FILE__ ) . 'js/spectrum.min.js', array( 'jquery' ), '1.8.0', true );
		wp_enqueue_script( 'wnumb', plugin_dir_url( __FILE__ ) . 'js/wNumb.js', array( 'jquery' ), '1.8.0', true );
		wp_enqueue_script( 'nouislider', plugin_dir_url( __FILE__ ) . 'js/nouislider.min.js', array( 'jquery' ), '1.8.0', true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wbldr-zooming-admin.js', array( 'jquery' ), $this->version, true );

		wp_localize_script( $this->plugin_name, 'nouirange', $this->wbldr_zooming_options['speed'] );
	}

	public function add_plugin_admin_menu() {
		add_options_page( 'wbldr Zooming Setup', 'wbldr Zooming', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page') );
	}

	public function add_action_links( $links ) {
		$settings_link = array(
			'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
		);

		return array_merge( $settings_link, $links );
	}

	public function display_plugin_setup_page() {
		include_once( 'partials/wbldr-zooming-admin-display.php' );
	}

	public function validate($input) {
		$valid = array();

		$valid['animation'] = $input['animation'];
		$valid['speed'] = $input['speed'];
		$valid['background'] = $input['background'];
		$valid['size'] = $input['size'];
		$valid['onclick'] = $input['onclick'];
        $valid['gallery'] = $input['gallery'];
        $valid['filename'] = $input['filename'];

		return $valid;
	}

	public function options_update() {
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}
}
