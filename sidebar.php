<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-blog' ) ) {
	return;
}
?>
<aside class="sidebar">
	<?php dynamic_sidebar( 'sidebar-blog' ); ?>
</aside>
