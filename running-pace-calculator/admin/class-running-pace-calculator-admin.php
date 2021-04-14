<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Running_Pace_Calculator
 * @subpackage Running_Pace_Calculator/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Running_Pace_Calculator
 * @subpackage Running_Pace_Calculator/admin
 * @author     Your Name <email@example.com>
 */
class Running_Pace_Calculator_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $running_pace_calculator    The ID of this plugin.
	 */
	private $running_pace_calculator;

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
	 * @param      string    $running_pace_calculator       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $running_pace_calculator, $version ) {

		$this->running_pace_calculator = $running_pace_calculator;
		$this->version = $version;

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
		 * defined in Running_Pace_Calculator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Running_Pace_Calculator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->running_pace_calculator, plugin_dir_url( __FILE__ ) . 'css/running-pace-calculator-admin.css', array(), $this->version, 'all' );

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
		 * defined in Running_Pace_Calculator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Running_Pace_Calculator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->running_pace_calculator, plugin_dir_url( __FILE__ ) . 'js/running-pace-calculator-admin.js', array( 'jquery' ), $this->version, false );

	}

}
