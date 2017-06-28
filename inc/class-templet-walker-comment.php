<?php
/**
 * Templet: Walker Comment
 *
 * Custom Comment Walker
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 */
class Templet_Walker_Comment extends Walker_Comment {

	/**
	 * Overwrite Walker_Comment class html5_comment function
	 *
	 * @link https://developer.wordpress.org/reference/hooks/wp_nav_menu_items/
	 *
	 * @param object $comment Current object comment.
	 * @param int    $depth Current comment depth.
	 * @param array  $args Menu args.
	 */
	function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		?>
		<<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body vcard">

				<?php if ( 0 !== $args['avatar_size'] ) : ?>
				<div class="comment__avatar">
					<?php echo get_avatar( $comment, 96 ); ?>
				</div>
				<?php endif; ?>

				<div class="comment__content">

					<header class="comment__content__header">
						<?php printf( '<b class="fn">%s</b>', get_comment_author_link() ); ?>
						<?php if ( '0' === $comment->comment_approved ) : ?>
							<span class="comment-awaiting-moderation">(<?php esc_html_e( 'Your comment is awaiting moderation.', 'templet' ); ?>)</span>
						<?php endif; ?>
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'templet' ), get_comment_date(), get_comment_time() ); ?>
							</time>
						</a>
						<?php edit_comment_link( __( 'Edit', 'templet' ), '<span class="edit-link">', '</span>' ); ?>
					</header>

					<div class="comment__content__text"><?php comment_text(); ?></div>

					<?php
					$post_id = get_the_ID();
					$post_type = get_post_type( $post_id );
					?>

					<?php if ( 'post' === $post_type ) : ?>
					<footer class="comment__footer">
						<div class="reply">
							<?php comment_reply_link( array_merge( $args, array(
								'add_below' => 'div-comment',
								'depth' => $depth,
								'max_depth' => $args['max_depth'],
							) ) ); ?>
						</div>
					</footer>
					<?php endif; ?>
				</div>

			</article>
		<?php
	}
}
