<?php
namespace GutenbergExTS {
    const PROJECT_NAME = "gutenbergex-ts";
    const PROJECT_CONFIG = array(
        "name" => PROJECT_NAME,

        "client_name" => PROJECT_NAME."-client",
        "admin_name" => PROJECT_NAME."-admin",
        
        "client_bundle_js_path" => "/public/client/main.js",
        "client_bundle_css_path" => "/public/client/main.css",
        "client_bundle_js_deps" => array( ),
        "client_bundle_css_deps" => array( ),
        "client_js_in_footer" => false,
        "client_css_media" => "all",
        "js_var_name" => "gex",
        
        "admin_bundle_js_path" => "/public/admin/main.js",
        "admin_bundle_css_path" => "/public/admin/main.css",
        "admin_bundle_js_deps" => array(  ),
        "admin_bundle_css_deps" => array( ),
        "admin_js_in_footer" => true,
        "admin_css_media" => "all"
    );
}
