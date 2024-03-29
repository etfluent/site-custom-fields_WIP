<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://etfluent.com
 * @since             1.0.0
 * @package           Site_Custom_Fields
 *
 * @wordpress-plugin
 * Plugin Name:       Site Custom Fields
 * Plugin URI:        http://etfluent.com/site-custom-fields
 * Description:       This plugin will create custom fields which can be used globally accross your site.
 * Version:           1.0.0
 * Author:            Mike Culpepper
 * Author URI:        http://etfluent.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       site-custom-fields
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-site-custom-fields-activator.php
 */
function activate_site_custom_fields() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-site-custom-fields-activator.php';
	Site_Custom_Fields_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-site-custom-fields-deactivator.php
 */
function deactivate_site_custom_fields() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-site-custom-fields-deactivator.php';
	Site_Custom_Fields_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_site_custom_fields' );
register_deactivation_hook( __FILE__, 'deactivate_site_custom_fields' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-site-custom-fields.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_site_custom_fields() {

	$plugin = new Site_Custom_Fields();
	$plugin->run();

}
run_site_custom_fields();
