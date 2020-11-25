<?php
/**
 * Templet: Vendor
 *
 * Functions releated to adapt common plugins to templet styles
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 */

/**
 * Remove css files from common plugins we don't use
 */
function tm_deregister_styles() {
	wp_deregister_style( 'contact-form-7' );
}
add_action( 'wp_print_styles', 'tm_deregister_styles', 100 );
