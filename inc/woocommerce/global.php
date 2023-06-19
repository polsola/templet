<?php
/**
 * Templet: WooCommerce
 *
 * Functions to alter the WooCommerce layout to match theme
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 */

/**
 * If WooCommerce is not active, return
 */
if ( ! class_exists( 'woocommerce' ) ) {
	return;
}

/**
 * Enqueue ecommerce scripts and styles.
 */
function tm_ecommerce_scripts() {
	$theme   = wp_get_theme();
	$version = $theme->get( 'Version' );

	wp_register_script( 'ecommerce', TM_STATIC . '/scripts/ecommerce.js', null, $version, true );
	wp_enqueue_script( 'ecommerce' );

}
add_action( 'wp_enqueue_scripts', 'tm_ecommerce_scripts', 0 );

/**
 * Add WooCommerce support for theme
 */
function tm_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'tm_woocommerce_support' );

/**
 * Remove WooCommerce default styles
 */
//add_filter( 'woocommerce_enqueue_styles', '__return_false' );

function tm_ecommerce_header_items() {
	?>
	<div class="flex items-center gap-2 justify-end">
	<?php
	get_template_part( 'template-parts/ecommerce/user-account');
	get_template_part( 'template-parts/ecommerce/mini-cart');
	?>
	</div>
	<?php 
}
add_action('tm_header_main', 'tm_ecommerce_header_items');


/**
 * Change number or products per row to 3
 */
function tm_loop_columns() {
	return 3; // 3 products per row
}
add_filter( 'loop_shop_columns', 'tm_loop_columns' );

/**
 * Remove sidebar from product page
 */
function ps_remove_sidebar_product_pages() {
	if ( is_product() ) {
		remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar',10 );
	}
}
//add_action( 'wp', 'ps_remove_sidebar_product_pages' );

/**
 * Change number and rows of related products
 *
 * @param array $args Array of argumnents for WooCommerce configuration.
 */
function tm_related_products_args( $args ) {
	$args['posts_per_page'] = 3;
	$args['columns'] = 3;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'tm_related_products_args' );

require_once 'cart.php';
require_once 'single.php';
require_once 'archive.php';
