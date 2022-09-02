<?php
namespace GutenbergExTS;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

include_once(dirname(__DIR__).'/config.php');

if (is_admin()) {
    add_action( 'admin_init', function() {
        add_action( 'enqueue_block_assets', function() {
            wp_enqueue_script(
                namespace\PROJECT_CONFIG['admin_name']."-block-js",
                plugins_url( namespace\PROJECT_CONFIG['admin_bundle_js_path'], dirname( __FILE__ ) ),
                namespace\PROJECT_CONFIG['admin_bundle_js_deps'],
                filemtime( dirname(__DIR__) . namespace\PROJECT_CONFIG['admin_bundle_js_path'] ),
                namespace\PROJECT_CONFIG['admin_js_in_footer']
            );
    
            wp_enqueue_style(
                namespace\PROJECT_CONFIG['admin_name']."-block-editor-css",
                plugins_url( namespace\PROJECT_CONFIG['admin_bundle_css_path'], dirname( __FILE__ ) ),
                namespace\PROJECT_CONFIG['admin_bundle_css_deps'],
                filemtime( dirname(__DIR__) . namespace\PROJECT_CONFIG['admin_bundle_css_path'] ),
                namespace\PROJECT_CONFIG['admin_css_media']
            );
    
            register_block_type(
                namespace\PROJECT_CONFIG['name']."/admin-block", array(
                    'editor_script' => namespace\PROJECT_CONFIG['admin_name']."-block-js",
                    'editor_style'  => namespace\PROJECT_CONFIG['admin_name']."-block-editor-css",
                )
            );
        });
    });
} else {

    add_action( 'init', function() {
        wp_enqueue_script(
            namespace\PROJECT_CONFIG['client_name']."-js",
            plugins_url( namespace\PROJECT_CONFIG['client_bundle_js_path'], dirname( __FILE__ ) ),
            namespace\PROJECT_CONFIG['client_bundle_js_deps'],
            filemtime( dirname(__DIR__) . namespace\PROJECT_CONFIG['client_bundle_js_path'] ),
            namespace\PROJECT_CONFIG['client_js_in_footer']
        );
    
        wp_enqueue_style(
            namespace\PROJECT_CONFIG['client_name']."-style-css",
            plugins_url( namespace\PROJECT_CONFIG['client_bundle_css_path'], dirname( __FILE__ ) ),
            namespace\PROJECT_CONFIG['client_bundle_css_deps'],
            filemtime( dirname(__DIR__) . namespace\PROJECT_CONFIG['client_bundle_css_path'] ),
            namespace\PROJECT_CONFIG['client_css_media']
        );

        add_action( 'wp', function() {
            include(dirname(__DIR__).'/variable.php');

            wp_add_inline_script(
                namespace\PROJECT_CONFIG['client_name'],
                "const ".namespace\PROJECT_CONFIG['js_var_name']." = ".json_encode($project_var),
                'before'
            );
        });
    
        register_block_type(
            namespace\PROJECT_CONFIG['name']."/client-block", array(
                'script' 		=> namespace\PROJECT_CONFIG['client_name']."-js",
                'style'         => namespace\PROJECT_CONFIG['client_name']."-style-css",
            )
        );
    });
}