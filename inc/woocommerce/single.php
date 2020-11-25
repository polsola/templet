<?php
/**
 * Templet: WooCommerce Single Product
 *
 * Functions to alter the WooCommerce single product layout to match theme
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 */

/**
 * Hook woocommerce single product to add foundation grid elements before item
 */
function tm_single_product_before() {
	echo '<div class="grid-container grid-container-padded"><div class="grid-x grid-margin-x"><div class="medium-6 cell">';
}
add_action( 'woocommerce_before_single_product_summary', 'tm_single_product_before', 0 );

/**
 * Hook woocommerce single product to add foundation grid elements after item
 */
function tm_single_product_after_image() {
	echo '</div><!-- END .medium-6 --><div class="medium-6 cell">';
}
add_action( 'woocommerce_before_single_product_summary', 'tm_single_product_after_image', 100 );

/**
 * Hook woocommerce single product to add foundation grid elements before tabs
 */
function tm_single_product_before_tabs() {
	echo '</div><!-- END .medium-6 --></div><!-- END Summary .grid-x --></div><!-- END Summary .grid-container -->';
}
add_action( 'woocommerce_after_single_product_summary', 'tm_single_product_before_tabs', 0 );
