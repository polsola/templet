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
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

function tm_add_product_description() {
	get_template_part( 'template-parts/ecommerce/single/description' );
	do_action('tm_after_product_description');
}
add_action('woocommerce_after_single_product_summary', 'tm_add_product_description', 12);
