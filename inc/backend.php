<?php
/**
 * Templet: Backend
 *
 * Useful backend functions
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 */

/**
 * Limit post revisions to 3
 *
 * @param int    $num Number of revisions.
 * @param object $post Current post object.
 */
function ps_limit_revisions_number( $num, $post ) {
	return 3;
}
add_filter( 'wp_revisions_to_keep', 'ps_limit_revisions_number', 10, 2 );
