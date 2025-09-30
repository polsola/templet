<?php

/**
 * Refresh cart totals in header
 */
function u_add_to_cart_fragment( $fragments ) {

	ob_start();

	$fragments['a.header__main__item--cart'] = u_get_header_cart_html();

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'u_add_to_cart_fragment' );