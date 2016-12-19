<?php
/**
 * Templet: Frontend
 *
 * Useful frontend functions
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 */

/**
* Custom pagination
*
* Convert the default WordPress pagination to a foundation friendly list
*/
function tm_pagination()
{

    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
            'prev_text'    => '«',
            'next_text'    => '»',
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="pagination text-center">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
}

/**
* Custom comments Walker
*/
class Templet_Walker_Comment extends Walker_Comment
{
    function html5_comment($comment, $depth, $args) {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
        ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body vcard">

                <?php if ( 0 != $args['avatar_size'] ): ?>
                <div class="comment__avatar">
                    <?php echo get_avatar( $comment, 96 ); ?>
                </div>
                <?php endif; ?>

                <div class="comment__content">

                    <header class="comment__content__header">
                        <?php printf('<b class="fn">%s</b>', get_comment_author_link()); ?>
                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <span class="comment-awaiting-moderation">(<?php _e( 'Your comment is awaiting moderation.', 'wayo' ); ?>)</span>
                        <?php endif; ?>
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                            <time datetime="<?php comment_time( 'c' ); ?>">
                                <?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'wayo' ), get_comment_date(), get_comment_time() ); ?>
                            </time>
                        </a>
                        <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
                    </header>

                    <div class="comment__content__text"><?php comment_text(); ?></div>

                    <?php
                    $post_id = get_the_ID();
                    $post_type = get_post_type($post_id);
                    ?>

                    <?php if ($post_type === 'post'): ?>
                    <footer class="comment__footer">
                        <div class="reply">
                            <?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                        </div>
                    </footer>
                    <?php endif; ?>
                </div>

            </article>
        <?php
    }
}

/**
* Remove Query String from Static Resources to improve browser caching
*
* @var $src url to css/js resource
*/
function tm_remove_cssjs_ver( $src )
{

 if( strpos( $src, '?ver=' ) || strpos( $src, '&ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;

}
add_filter( 'style_loader_src', 'tm_remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'tm_remove_cssjs_ver', 10, 2 );
