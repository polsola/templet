<?php

/**
 * Set path to store ACF json fields
 */
function u_acf_json_save_point( $path ) {

	// update path
	$path = get_stylesheet_directory() . '/inc/vendor/acf';

	// return
	return $path;

}
add_filter('acf/settings/save_json', 'u_acf_json_save_point');

/**
 * Set path to load ACF json fields
 */
function u_acf_json_load_point( $paths ) {

	// remove original path (optional)
	unset($paths[0]);
	// append path
	$paths[] = get_stylesheet_directory() . '/inc/vendor/acf';

	// return
	return $paths;

}
add_filter('acf/settings/load_json', 'u_acf_json_load_point');
