<?php
/**
 * Templet: Post
 *
 * Functions for the post post_type
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 */

/**
 * Add post meta to page-header on single post
 */
function tm_post_header_before_title() {
	global $post;

	if ( is_single() ) {
		?>
		<div class="menu-centered">
			<ul class="menu">
				<li><?php the_category( ', ' ); ?></li>
				<li><?php echo get_the_date(); ?></li>
			</ul>
		</div>
		<?php
	}
}
add_action( 'tm_page_header_before_title', 'tm_post_header_before_title' );

require_once 'class-templet-walker-comment.php';
