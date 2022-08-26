<?php
/**
 * Plugin Name:       Getenberg-TS
 * Description:       Gutenberg + React + Typescript template
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            YW Chen
 * License:           MIT
 * License URI:       
 * Text Domain:       gutenberg-ts
 *
 * @package           gutenberg-ts
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/wp_enqueue.php';