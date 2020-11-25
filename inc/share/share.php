<?php
/**
 * Templet: Share
 *
 * Functions for the frontend share module
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 */

/**
 * Share buttons url generator
 *
 * @param string $type The social network id to create url from.
 * @param string $url The url to share.
 * @param string $text Optional text to add to the shared publication.
 */
function tm_share( $type, $url, $text = '' ) {
	$share_url = '#';

	switch ( $type ) {
		case 'twitter':
			$share_url = 'https://twitter.com/intent/tweet?';
			$share_url .= http_build_query(array(
				'url' => $url,
				'text' => $text,
			));
			break;

		case 'facebook':
			$share_url = 'https://www.facebook.com/sharer/sharer.php?';
			$share_url .= http_build_query(array(
				'u' => $url,
			));
			break;
		case 'google-plus':
			$share_url = 'https://plus.google.com/share?';
			$share_url .= http_build_query(array(
				'url' => $url,
			));
			break;
		case 'whatsapp':
			$share_url = 'whatsapp://send?';
			$share_url .= http_build_query(array(
				'text' => $url,
			));

			break;
	}

	return $share_url;

}

/**
 * Add share buttons to wp_footer for single pages
 */
function tm_add_share_footer() {
	if ( is_single() ) :
		get_template_part( 'template-parts/share' );
	endif;
}
add_action( 'wp_footer', 'tm_add_share_footer' );
