<?php
/**
 * Plugin Name: Johnee's Custom Elementor Widgets
 * Description: A couple test case widgets
 * Version:     0.0.5
 * Author:      Johnee Evanofski
 * Author URI:  https://johnevanofski.net
 * Text Domain: johnee-addons
 */

 function elementor_addon() {

	// Load plugin file
	require_once( __DIR__ . '/plugin.php' );

	// Run the plugin
	\Elementor_Addon\Plugin::instance();

}

add_action( 'plugins_loaded', 'elementor_addon' );