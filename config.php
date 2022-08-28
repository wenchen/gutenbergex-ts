<?php

if ( ! defined( "ABSPATH" ) ) {
    exit;
}

$project_name = "gutenberg-ts";
$project_config = array(
    "name" => $project_name,

    "client_name" => "{$project_name}-client",
    "admin_name" => "{$project_name}-admin",
    
    "client_bundle_js_path" => "/public/client/main.js",
    "client_bundle_css_path" => "/public/client/main.css",
    "client_bundle_js_deps" => array( ),
    "client_bundle_css_deps" => array( ),
    "client_js_in_footer" => false,
    "client_css_media" => "all",
    
    "admin_bundle_js_path" => "/public/admin/main.js",
    "admin_bundle_css_path" => "/public/admin/main.css",
    "admin_bundle_js_deps" => array(  ),
    "admin_bundle_css_deps" => array( ),
    "admin_js_in_footer" => true,
    "admin_css_media" => "all"
);

