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
function u_deregister_styles() {
	wp_deregister_style( 'contact-form-7' );
}
add_action( 'wp_print_styles', 'u_deregister_styles', 100 );

/**
 * Dequeue scripts and styles if no contact form is used
 */
function u_remove_recaptcha_from_pages() {
	global $post;
	if ( !isset( $post->post_content ) || !has_shortcode( $post->post_content, 'contact-form-7' ) ) {
		// there is no wpcf7 form on this page so remove all the wpcf7 scripts
		add_filter( 'wpcf7_load_js', '__return_false' );
		add_filter( 'wpcf7_load_css', '__return_false' );
		remove_action('wp_enqueue_scripts', 'contact-form-7' );
		remove_action('wp_enqueue_scripts', 'wpcf7_do_enqueue_scripts');
		remove_action('wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 20);
		
	}
}
add_action( 'wp_enqueue_scripts', 'u_remove_recaptcha_from_pages', 1 );
