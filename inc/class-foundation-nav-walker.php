<?php
/**
 * Templet: Foundation Nav Walker
 *
 * Custom Nav Menu Walker
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 */
class Foundation_Nav_Walker extends Walker_Nav_Menu {

	/**
	 * Add vertical menu class and submenu data attribute to sub menus
	 *
	 * @param object $output Html output.
	 * @param int    $depth Current menu item depth.
	 * @param array  $args Menu args.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"vertical menu\" data-submenu>\n";
	}
}
