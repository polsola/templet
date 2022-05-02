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
	wp_enqueue_style( 'app', TM_STATIC . '/styles/app.css' );

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,700' );

	wp_register_script( 'app', TM_STATIC . '/scripts/app.js', null, '1.0', true );
	$variables_array = array(
		'site_url' => site_url(),
	);
	wp_localize_script( 'app', 'wp_vars', $variables_array );
	wp_enqueue_script( 'app' );

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

				$button = '<li class="header__nav__item--cta"><a class="button" href="#">Contact us</a></li>';
		$items .= $button;

	}
	return $items;
}
//add_filter( 'wp_nav_menu_items', 'tm_append_nav_menu_items', 10, 2 );

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

function tm_icon($icon, $class = "w-8 h-8" ) {
	?>
	<svg class="icon <?php echo $class; ?>" xmlns=http://www.w3.org/2000/svg role="img" >
		<use xlink:href="<?php echo TM_STATIC; ?>/images/icons.svg#<?php echo $icon; ?>"></use>
	</svg>
	<?php
}
