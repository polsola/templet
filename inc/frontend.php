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
function u_scripts() {
	$theme   = wp_get_theme();
	$version = $theme->get( 'Version' );
	wp_enqueue_style( 'app', u_STATIC . '/styles/app.css' );

	wp_register_script( 'app', u_STATIC . '/scripts/app.js', null, $version, true );
	$variables_array = array(
		'site_url' => site_url(),
	);
	wp_localize_script( 'app', 'wp_vars', $variables_array );
	wp_enqueue_script( 'app' );

}
add_action( 'wp_enqueue_scripts', 'u_scripts', 0 );

/**
 * Custom pagination
 *
 * Convert the default WordPress pagination to a foundation friendly pagination
 *
 * @link http://foundation.zurb.com/sites/docs/pagination.html
 */
function u_pagination() {

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
		echo '<div class="flex justify-center my-8"><ul class="pagination" role="navigation" aria-label="Pagination">';

		foreach ( $pages as $page ) {

			echo '<li>' . $page . '</li>';
		}
		echo '</ul></div>';
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
function u_append_nav_menu_items( $items, $args ) {

	$menu = 'primary';

	if ( $args->theme_location === $menu ) {

				$button = '<li class="header__nav__item--cta"><a class="button" href="#">Contact us</a></li>';
		$items .= $button;

	}
	return $items;
}
//add_filter( 'wp_nav_menu_items', 'u_append_nav_menu_items', 10, 2 );

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
function u_icon($icon, $size, $class = "w-8 h-8" ) {
	echo u_get_icon($icon, $size, $class );
}
function u_get_icon($icon, $size, $class = "w-8 h-8" ) {
	ob_start();
	?>
	<svg class="icon <?php echo $class; ?>" viewBox=" 0 0 <?php echo $size . ' ' . $size; ?>" xmlns=http://www.w3.org/2000/svg role="img" >
		<use xlink:href="<?php echo u_STATIC; ?>/images/icons.svg#<?php echo $icon; ?>"></use>
	</svg>
	<?php
	return ob_get_clean();
}

function u_add_icon_to_dropdown_menu_item($item_output, $item, $depth, $args) {

	// Check if the item has children
	if (in_array('menu-item-has-children', $item->classes)) {
		$icon = u_get_icon('chevron-down', 24, 'w-4 h-4 fill-current ml-1'); // Added ml-1 for spacing
		// Append the icon to the link text
		$item_output = preg_replace('/(<a.*?>[^<]+)(<\\/a>)/', '$1 ' . $icon . '$2', $item_output);
	}

	return $item_output;
}
add_filter('walker_nav_menu_start_el', 'u_add_icon_to_dropdown_menu_item', 10, 4);

/**
 * Before main header
 */
function u_upper_header() {
	get_template_part( 'template-parts/header/upper' );
}
add_action('u_header_main_before', 'u_upper_header');

/**
 * Add footer credits
 */
function u_add_website_credits() {
	?>
	<p class="footer__credits__text md:text-right">
		© <?php echo esc_html( date( 'Y' ) ); ?> 
		<?php esc_html_e( 'All rights reserved', 'templet' ); ?>. 
		<?php printf(__( 'Website created by %s', 'templet' ), '<a class="text-primary" href="https://www.utrans.global" title="Utrans" target="_blank">Utrans</a>'); ?>
	</p>
	<?php
}
add_action('u_footer_credits', 'u_add_website_credits', 20);

function u_get_contact_page_url() {
	if( !function_exists('get_field') ) {
		return '#';
	}
	$contact_page_id = get_field( 'contact_page', 'option' );
	if ( $contact_page_id ) {
		return get_permalink( $contact_page_id );
	} else {
		return '#';
	}
}