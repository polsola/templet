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
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'tm_woocommerce_support' );

/**
 * Remove WooCommerce default styles
 */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Hook woocommerce list to add foundation grid elements
 */
function tm_woocommerce_before_list()
{
	echo '<div class="row"><div class="large-8 columns">';
}
add_action( 'woocommerce_before_main_content', 'tm_woocommerce_before_list', 1);

function tm_woocommerce_after_list()
{
	echo '</div><!-- END .large-8 --><div class="large-4 columns">';
}
add_action( 'woocommerce_after_main_content', 'tm_woocommerce_after_list', 100);

function tm_woocommerce_after_sidebar()
{
	echo '</div><!-- END .large-4 --></div><!-- END .row -->';
}
add_action( 'woocommerce_sidebar', 'tm_woocommerce_after_sidebar');


/**
 * Change number or products per row to 3
 */

if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}
add_filter('loop_shop_columns', 'loop_columns');