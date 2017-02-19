<?php

/**
 * Plugin Name: Bridge: Post Formats
 * Description: Expose Post Formats in WP REST API.
 * Version: 0.2.0
 * Author: Dzikri Aziz
 * Author URI: http://kucrut.org
 * Plugin URI: https://github.com/kucrut/wp-bridge-post-formats
 * License: GPLv2
 */

/**
 * Expose post formats taxonomy in REST API
 *
 * @wp_hook action init
 */
function _bridge_expose_post_formats() {
	global $wp_taxonomies;

	if ( ! isset( $wp_taxonomies['post_format'] ) ) {
		return;
	}

	if ( ! class_exists( 'WP_REST_Terms_Controller' ) ) {
		return;
	}

	$wp_taxonomies['post_format']->show_in_rest = true;
	$wp_taxonomies['post_format']->rest_base = 'formats';
	$wp_taxonomies['post_format']->rest_controller_class = 'WP_REST_Terms_Controller';
}
add_action( 'init', '_bridge_expose_post_formats', 11 );
