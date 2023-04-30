<?php

/**
 * Plugin Name:      Dash Info
 * Plugin URI:        https://github.com/shariffff/wp-starter-plugin
 * Description:       Starter Plugin using WP packages.
 * Text Domain:       dash-info
 * Domain Path:       /languages
 * Author:            Sharif Mohammad Eunus
 * Author URI:       https://github.com/shariffff/wp-starter-plugin
 * Version:           1.0.0
 * Requires at least: 5.8
 * Tested up to:      6.2
 * Requires PHP:      8.0
 */

// if (!defined('ABSPATH')) {
// 	exit;
// }

namespace Dash_Info;

function exit_if_abspath_not_defined($message = '')
{
	if (!defined('ABSPATH')) {
		die($message);
	}
}
\Dash_Info\exit_if_abspath_not_defined();

define('DASH_INFO_PATH', plugin_dir_path(__FILE__));
define('DASH_INFO_URL', plugins_url('/', __FILE__));
define('DASH_INFO_PLUGIN_FILE', __FILE__);
define('DASH_INFO_PLUGIN_DIR', __DIR__);
define('DASH_INFO_VERSION', '1.0.0');


require_once(dirname(__FILE__) . '/class-hc.php');
require_once(dirname(__FILE__) . '/tools-class.php');
// require_once(dirname(__FILE__) . '/tools.php');

require_once(dirname(__FILE__) . '/info/htaccess.php');
require_once(dirname(__FILE__) . '/info/count.php');
require_once(dirname(__FILE__) . '/info/users.php');
require_once(dirname(__FILE__) . '/info/media.php');
require_once(dirname(__FILE__) . '/info/tables.php');
new Dash_Info;
// make a dd function that dies and dumps
function dd($data)
{
	echo '<pre>';
	var_dump($data);
	die();
}
