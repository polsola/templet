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
 * Enqueue scripts and styles.
 */
function tm_scripts() {
	wp_enqueue_style( 'app', get_template_directory_uri() . '/static/css/app.css' );

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,700' );

	wp_enqueue_script( 'jquery' );
	wp_register_script( 'app', get_template_directory_uri() . '/static/scripts/app.js', array( 'jquery' ), '1.0', true );
	$variables_array = array(
		'site_url' => site_url(),
	);
	wp_localize_script( 'app', 'wp_vars', $variables_array );
	wp_enqueue_script( 'app' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'tm_scripts' );

/**
 * Custom pagination
 *
 * Convert the default WordPress pagination to a foundation friendly pagination
 *
 * @link http://foundation.zurb.com/sites/docs/pagination.html
 */
function tm_pagination() {

	global $wp_query;
	$big = 999999999; // need an unlikely integer.

		$pages = paginate_links( array(
			'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'        => '?paged=%#%',
			'current'       => max( 1, get_query_var( 'paged' ) ),
			'total'         => $wp_query->max_num_pages,
			'prev_next'     => false,
			'type'          => 'array',
			'prev_next'     => true,
			'prev_text'     => '«',
			'next_text'     => '»',
		) );

	if ( is_array( $pages ) ) {
		$paged = ( get_query_var( 'paged' ) === 0 ) ? 1 : get_query_var( 'paged' );
		echo '<ul class="pagination text-center" role="navigation" aria-label="Pagination">';

		foreach ( $pages as $page ) {

			echo '<li>' . esc_html( $page ) . '</li>';
		}
		echo '</ul>';
	}
}

/**
 * Remove Query String from Static Resources to improve browser caching
 *
 * @param string $src url to css/js resource.
 */
function tm_remove_cssjs_ver( $src ) {

	if ( strpos( $src, '?ver=' ) || strpos( $src, '&ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;

}
add_filter( 'style_loader_src', 'tm_remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'tm_remove_cssjs_ver', 10, 2 );

/**
 * Add item to main nav
 * Hook to menus and add items with diferent layouts, for example a cta button
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_nav_menu_items/
 *
 * @param array $items Menu items.
 * @param array $args Menu args.
 */
function tm_append_nav_menu_items( $items, $args ) {

	$menu = 'primary';

	if ( $args->theme_location === $menu ) {

				$button = '<li class="header__nav__item--cta"><a class="button" href="#">' . __( 'Contact us', 'templet' ) . '</a></li>';
		$items .= $button;

	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'tm_append_nav_menu_items', 10, 2 );

/**
 * Include favicon, apple-touch icon and manifest to wp_head
 *
 * Generate your assets with http://realfavicongenerator.net/
 */
function tm_favicon_head() {
	?>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( TM_STATIC ); ?>/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="<?php echo esc_url( TM_STATIC ); ?>/images/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo esc_url( TM_STATIC ); ?>/images/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?php echo esc_url( TM_STATIC ); ?>/images/manifest.json">
	<link rel="mask-icon" href="<?php echo esc_url( TM_STATIC ); ?>/images/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">
	<?php
}
add_action( 'wp_head', 'tm_favicon_head' );

/**
 * Similar to the_post_thumbnail but using the interchange library from foundation-sites
 *
 * @link http://foundation.zurb.com/sites/docs/interchange.html
 *
 * @param array $small_size Small image size.
 */
function tm_the_post_thumbnail( $small_size = array( 960, 450 ) ) {
	global $post;
	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
		<img data-interchange="[<?php echo esc_url( the_post_thumbnail_url( $small_size ) ); ?>, small], [<?php echo esc_url( the_post_thumbnail_url( array( $small_size[0] * 2, $small_size[1] * 2 ) ) ); ?>, retina]" alt="<?php the_title(); ?>">
	<?php }
}

/**
 * Hook the WP menu class to add BEM classes
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/nav_menu_css_class
 *
 * @param array  $classes Menu item css classes.
 * @param object $item Menu current item.
 * @param array  $args Menu item args.
 */
function ps_menu_classes( $classes, $item, $args ) {

	$classes[] = 'menu__item';

	if ( $item->current ) {
		$classes[] = 'menu__item--active';
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'ps_menu_classes', 10, 3 );

require_once 'share/share.php';
