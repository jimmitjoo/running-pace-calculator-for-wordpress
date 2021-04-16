<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Running_Pace_Calculator
 *
 * @wordpress-plugin
 * Plugin Name:       Running Pace Calculator
 * Plugin URI:        https://xn--lpning-wxa.se/
 * Description:       This is a running pace calculator for WordPress.
 * Version:           1.0.0
 * Author:            HACKson
 * Author URI:        https://xn--lpning-wxa.se/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       running-pace-calculator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'RUNNING_PACE_CALCULATOR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-running-pace-calculator-activator.php
 */
function activate_running_pace_calculator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-running-pace-calculator-activator.php';
	Running_Pace_Calculator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-running-pace-calculator-deactivator.php
 */
function deactivate_running_pace_calculator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-running-pace-calculator-deactivator.php';
	Running_Pace_Calculator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_running_pace_calculator' );
register_deactivation_hook( __FILE__, 'deactivate_running_pace_calculator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-running-pace-calculator.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_running_pace_calculator() {

	$plugin = new Running_Pace_Calculator();
	$plugin->run();

}
run_running_pace_calculator();
