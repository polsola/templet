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
 * Add WooCommerce support for theme
 */
function tm_woocommerce_support() {
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'tm_woocommerce_support' );

/**
 * Remove WooCommerce default styles
 */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Get container class for WooCommerce pages
 */
function tm_get_container_class() {
	$css_class = array();

	if ( is_product() ) {
		$css_class[] = 'large-12';
	} else {
		$css_class[] = 'large-8';
	}

	$css_class[] = 'columns';

	return implode( $css_class, ' ' );
}

/**
 * Hook woocommerce list to add foundation grid elements before list
 */
function tm_woocommerce_before_list() {
	echo '<div class="row"><div class="' . esc_html( tm_get_container_class() ) . '">';
}
add_action( 'woocommerce_before_main_content', 'tm_woocommerce_before_list', 1 );

/**
 * Hook woocommerce list to add foundation grid elements after list
 */
function tm_woocommerce_after_list() {
	echo '</div><!-- END .large-8 --><div class="large-4 columns">';
}
add_action( 'woocommerce_after_main_content', 'tm_woocommerce_after_list', 100 );

/**
 * Hook woocommerce list to add foundation grid elements after sidebar
 */
function tm_woocommerce_after_sidebar() {
	echo '</div><!-- END .large-4 --></div><!-- END .row -->';
}
add_action( 'woocommerce_sidebar', 'tm_woocommerce_after_sidebar' );


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
add_action( 'wp', 'ps_remove_sidebar_product_pages' );

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

require_once 'single.php';
