<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include_once(dirname(__DIR__).'/config.php');

if (is_admin()) {
	add_action( 'admin_init', function() {
		add_action( 'enqueue_block_assets', function() {
			global $project_config;

			wp_enqueue_script(
				"{$project_config['admin_name']}-block-js",
				plugins_url( $project_config['admin_bundle_js_path'], dirname( __FILE__ ) ),
				$project_config['client_bundle_js_deps'],
				filemtime( dirname(__DIR__) . $project_config['admin_bundle_js_path'] ),
				$project_config['admin_js_in_footer']
			);
	
			wp_enqueue_style(
				"{$project_config['admin_name']}-block-editor-css",
				plugins_url( $project_config['admin_bundle_css_path'], dirname( __FILE__ ) ),
				$project_config['admin_bundle_css_deps'],
				filemtime( dirname(__DIR__) . $project_config['admin_bundle_css_path'] ),
				$project_config['admin_css_media']
			);
	
			register_block_type(
				"{$project_config['name']}/admin-block", array(
					'editor_script' => "{$project_config['admin_name']}-block-js",
					'editor_style'  => "{$project_config['admin_name']}-block-editor-css",
				)
			);
		});
	}, 1);
} else {

	add_action( 'init', function() {
		global $project_config;

		wp_enqueue_script(
			"{$project_config['client_name']}-js",
			plugins_url( $project_config['client_bundle_js_path'], __FILE__ ),
			$project_config['client_bundle_js_deps'],
			filemtime( dirname(__DIR__) . $project_config['client_bundle_js_path'] ),
			$project_config['client_js_in_footer']
		);
	
		wp_enqueue_style(
			"{$project_config['client_name']}-style-css",
			plugins_url( $project_config['client_bundle_css_path'], dirname( __FILE__ ) ),
			$project_config['client_bundle_css_deps'],
			filemtime( dirname(__DIR__) . $project_config['client_bundle_css_path'] ),
			$project_config['client_css_media']
		);
	
		register_block_type(
			"{$project_config['name']}/client-block", array(
				'script' 		=> "{$project_config['client_name']}-js",
				'style'         => "{$project_config['client_name']}-style-css",
			)
		);
	}, 1);
}