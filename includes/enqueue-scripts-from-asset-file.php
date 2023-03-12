<?php


function enqueue_scripts_from_asset_file($name, $plugin_file)
{
	$script_asset_path = dirname($plugin_file) . "/build/$name.asset.php";
	if (file_exists($script_asset_path)) {
		$script_asset = include $script_asset_path;
		$script_dependencies = $script_asset['dependencies'] ?? [];

		if (in_array('wp-media-utils', $script_dependencies, true)) {
			wp_enqueue_media();
		}

		if (in_array('wp-react-refresh-runtime', $script_asset['dependencies'], true) && !constant('SCRIPT_DEBUG')) {
			wp_die(esc_html__('SCRIPT_DEBUG should be `true` to use Hot Module Replacement.
			`define( "SCRIPT_DEBUG", true );` ', 'text-domain'));
		}

		wp_enqueue_script("wordpress-starter-plugin-$name", plugins_url("build/$name.js", $plugin_file), $script_dependencies, $script_asset['version'], true);

		$style_dependencies = [];


		if (in_array('wp-components', $script_dependencies, true)) {
			$style_dependencies[] = 'wp-components';
		}

		wp_enqueue_style("wordpress-starter-plugin-$name", plugins_url("build/$name.css", $plugin_file), $style_dependencies, $script_asset['version'], 'all');
	}
}
