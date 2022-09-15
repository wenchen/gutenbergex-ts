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
                namespace\PROJECT_CONFIG['name'],
                plugins_url( namespace\PROJECT_CONFIG['admin_bundle_js_path'], dirname( __FILE__ ) ),
                namespace\PROJECT_CONFIG['admin_bundle_js_deps'],
                filemtime( dirname(__DIR__) . namespace\PROJECT_CONFIG['admin_bundle_js_path'] ),
                namespace\PROJECT_CONFIG['admin_js_in_footer']
            );
    
            wp_enqueue_style(
                namespace\PROJECT_CONFIG['name']."-block-editor",
                plugins_url( namespace\PROJECT_CONFIG['admin_bundle_css_path'], dirname( __FILE__ ) ),
                namespace\PROJECT_CONFIG['admin_bundle_css_deps'],
                filemtime( dirname(__DIR__) . namespace\PROJECT_CONFIG['admin_bundle_css_path'] ),
                namespace\PROJECT_CONFIG['admin_css_media']
            );
    
            register_block_type(
                namespace\PROJECT_CONFIG['name']."/admin-block", array(
                    'editor_script' => namespace\PROJECT_CONFIG['name']."-block",
                    'editor_style'  => namespace\PROJECT_CONFIG['name']."-block-editor",
                )
            );

            // ${domain}-${locale}-${handler}.json
            wp_set_script_translations(
                namespace\PROJECT_CONFIG['name'],
                namespace\PROJECT_CONFIG['i18n_domain'],
                plugin_dir_path( __DIR__ ).'languages');
        });
    });
} else {

    add_action( 'init', function() {
        wp_enqueue_script(
            namespace\PROJECT_CONFIG['name'],
            plugins_url( namespace\PROJECT_CONFIG['client_bundle_js_path'], dirname( __FILE__ ) ),
            namespace\PROJECT_CONFIG['client_bundle_js_deps'],
            filemtime( dirname(__DIR__) . namespace\PROJECT_CONFIG['client_bundle_js_path'] ),
            namespace\PROJECT_CONFIG['client_js_in_footer']
        );
    
        wp_enqueue_style(
            namespace\PROJECT_CONFIG['name']."-style",
            plugins_url( namespace\PROJECT_CONFIG['client_bundle_css_path'], dirname( __FILE__ ) ),
            namespace\PROJECT_CONFIG['client_bundle_css_deps'],
            filemtime( dirname(__DIR__) . namespace\PROJECT_CONFIG['client_bundle_css_path'] ),
            namespace\PROJECT_CONFIG['client_css_media']
        );

        add_action( 'wp', function() {
            include(dirname(__DIR__).'/variable.php');

            wp_add_inline_script(
                namespace\PROJECT_CONFIG['name'],
                "const ".namespace\PROJECT_CONFIG['js_var_name']." = ".json_encode($project_var),
                'before'
            );
        });
    
        register_block_type(
            namespace\PROJECT_CONFIG['name']."/client-block", array(
                'script' 		=> namespace\PROJECT_CONFIG['name'],
                'style'         => namespace\PROJECT_CONFIG['name']."-style",
            )
        );

        // ${domain}-${locale}-${handler}.json
        wp_set_script_translations(
            namespace\PROJECT_CONFIG['name'],
            namespace\PROJECT_CONFIG['i18n_domain'],
            plugin_dir_path( __DIR__ ).'languages');
    });
}