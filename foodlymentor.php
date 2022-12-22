<?php

/**
 * Plugin Name: Foodlymentor
 * Plugin URI: https: //foodlymentor.com
 * Description: Food delivery WooCommerce plugin with widgets for Elementor + awesome design and features
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: iWebDesigner
 * Author URI:
 * License: GPLv2 or later
 * License URI: https: //www.gnu.org/licenses/gpl-2.0.html
 * Update URI: 
 * Text Domain: foodlymentor
 * Domain Path: /languages
 */


// If this file is called firectly, abort!!!
defined('ABSPATH') or die('Hey, Stay out of here. You are blocked!');

// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

if (file_exists(dirname(__FILE__) . '/functions.php')) {
	require_once dirname(__FILE__) . '/functions.php';
}

if (file_exists(dirname(__FILE__) . '/libs/cmb2.php')) {
	require_once dirname(__FILE__) . '/libs/cmb2.php';
}

/**
 * Define constants
 */
define('FOODLYMENTOR_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('FOODLYMENTOR_PLUGIN_URL', plugins_url('/', __FILE__));
define('FOODLYMENTOR_ASSETS_URL', plugins_url('/assets', __FILE__));

define('FOODLYMENTOR_ADMIN_DIR', FOODLYMENTOR_PLUGIN_DIR . '/includes/Admin');
define('FOODLYMENTOR_FRONTEND_DIR', FOODLYMENTOR_PLUGIN_DIR . '/includes/Frontend');


/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('Inc\\Init')) {
	Inc\Init::registerServices();
}
