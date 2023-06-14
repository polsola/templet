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

	wp_register_script( 'app', TM_STATIC . '/scripts/app.js', null, '1.0', true );
	$variables_array = array(
		'site_url' => site_url(),
	);
	wp_localize_script( 'app', 'wp_vars', $variables_array );
	wp_enqueue_script( 'app' );

}
add_action( 'wp_enqueue_scripts', 'tm_scripts', 0 );

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

			echo '<li>' . $page . '</li>';
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

/**
 * Icon sprite
 */
function tm_icon($icon, $size, $class = "w-8 h-8" ) {
	?>
	<svg class="icon <?php echo $class; ?>" viewBox=" 0 0 <?php echo $size . ' ' . $size; ?>" xmlns=http://www.w3.org/2000/svg role="img" >
		<use xlink:href="<?php echo TM_STATIC; ?>/images/icons.svg#<?php echo $icon; ?>"></use>
	</svg>
	<?php
}

/**
 * Before main header
 */
function tm_upper_header() {
	get_template_part( 'template-parts/header/upper' );
}
add_action('tm_header_main_before', 'tm_upper_header');


/**
 * Add main menu
 */
function tm_add_main_menu() {
	?>
	<div class="bg-gray-100 hidden lg:block">
	<nav class="header__nav container mx-auto">
		<?php
		wp_nav_menu( array(
			'sort_column'     => 'menu_order',
			'container'       => false,
			'menu_class'      => 'menu',
			'theme_location'  => 'primary',
			)
		);
		?>
	</nav>
	</div>
	<?php
}
add_action('tm_header_main_after', 'tm_add_main_menu');
