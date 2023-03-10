<?php


add_action('admin_menu', 'admin_menu', 100);

function admin_menu()
{
	$hook_name = add_menu_page(
		__('WP Starter', 'text-domain'),
		__('WP Starter', 'text-domain'),
		'manage_options',
		'wp-starter',
		function () {
			echo <<<HTML
				<noscript>Enable JavaScript to run this app.</noscript>
				<div id="app"></div>
			HTML;
		},
		'dashicons-lightbulb',
		null
	);

	add_action("load-{$hook_name}", 'admin_page_load');
}


function prefix_wp_enqueue_scripts()
{
	enqueue_scripts_from_asset_file('index', WP_STARTER_PLUGIN_PLUGIN_FILE);
}

function admin_page_load()
{
	add_action('admin_enqueue_scripts',  'prefix_wp_enqueue_scripts');
	remove_all_filters('admin_footer_text');
	remove_filter('update_footer', 'core_update_footer');
	add_filter('update_footer',  '__return_empty_string');
	add_filter('admin_footer_text',  '__return_empty_string');
}
