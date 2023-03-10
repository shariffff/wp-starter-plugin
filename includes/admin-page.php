<?php


add_action('admin_menu', 'admin_menu', 100);

function admin_menu()
{
	$hook_name = add_menu_page(
		__('WP Starter', 'text-domain'),
		__('WP Starter', 'text-domain'),
		'manage_options',
		'wp-starter',
		'admin_page',
		'dashicons-games',
		null
	);

	add_action("load-{$hook_name}", 'admin_page_load');
}


/**
 * Includes asset.
 *
 * @return void
 */
function prefix_wp_enqueue_scripts()
{
	enqueue_scripts_from_asset_file('settings', WP_STARTER_PLUGIN_PLUGIN_FILE);
}

function admin_page_load()
{
	add_action('admin_enqueue_scripts',  'prefix_wp_enqueue_scripts');
	remove_all_filters('admin_footer_text');
	remove_filter('update_footer', 'core_update_footer');
	add_filter('update_footer',  '__return_null');
	add_filter('admin_footer_text',  '__return_null');
}

function admin_page()
{
?>
	<noscript>
		<div class="no-js"><?php echo esc_html__('Warning: This options panel will not work properly without JavaScript, please enable it.', 'text-domain'); ?></div>
	</noscript>
	<style>
		#ui-loading {
			height: calc(100vh - 100px);
			display: flex;
			align-items: center;
			justify-content: center;
		}
	</style>
	<div id="ui-loading"><?php echo esc_html__('Loading…', 'text-domain'); ?></div>
	<div id="app"></div>
<?php
}
