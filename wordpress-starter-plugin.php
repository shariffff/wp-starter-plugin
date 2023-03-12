<?php

/**
 * Plugin Name:       WordPress Starter Plugin
 * Plugin URI:        https://github.com/shariffff/wp-starter-plugin
 * Description:       Starter Plugin using WP packages.
 * Text Domain:       text-domain
 * Domain Path:       /languages
 * Author:            Sharif Mohammad Eunus
 * Author URI:       https://github.com/shariffff/wp-starter-plugin
 * Version:           0.0.1
 * Requires at least: 5.8
 * Tested up to:      6.1.1
 * Requires PHP:      8.0
 */

if (!defined('ABSPATH')) {
	exit;
}

define('WP_STARTER_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('WP_STARTER_PLUGIN_URL', plugins_url('/', __FILE__));
define('WP_STARTER_PLUGIN_PLUGIN_FILE', __FILE__);
define('WP_STARTER_PLUGIN_PLUGIN_DIR', __DIR__);
define('WP_STARTER_PLUGIN_VERSION', '0.0.1');

require 'includes/enqueue-scripts-from-asset-file.php';
require 'includes/admin-page.php';
