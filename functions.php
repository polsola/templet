<?php
/**
 * The functions.php file is where you add unique features to your WordPress theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 * @version 1.0
 */

define( 'u_THEME', get_template_directory_uri() );
define( 'u_STATIC', u_THEME . '/static' );


/**
 * Theme init
 */
function u_init() {

	require_once 'inc/login.php';
	require_once 'inc/vendor/wpml.php';
	require_once 'inc/vendor/contact-form.php';

	if ( is_admin() ) {
		require_once 'inc/backend.php';
	}
}
add_action( 'init', 'u_init' );

/**
 * Frontend stuff
 */
require_once 'inc/frontend.php';

/**
 * ACF configuration
 */
require_once 'inc/vendor/acf.php';

/**
 * After setup theme
 */
function u_setup() {
	load_theme_textdomain( 'templet', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => 'Primary',
		'secondary' => 'Secondary',
		'footer'    => 'Footer',
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
add_action( 'after_setup_theme', 'u_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function u_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-blog',
		'description'   => 'Add widgets here to appear in your sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget__title">',
		'after_title'   => '</h5>',
	) );

	$footer_sidebars = apply_filters('u_footer_columns', 4);

	register_sidebars($footer_sidebars, array(
		// translators: Number of current footer.
		'name'          => 'Footer %d',
		'id'            => 'sidebar-footer',
		'description'   => 'Add widgets here to appear in your footer',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget__title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'u_widgets_init' );

/**
 * Set default Content Width
 *
 * @link https://codex.wordpress.org/Content_Width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 960;
}

/**
 * Include Google fonts to front and back (For Gutenberg editor)
 */
function u_get_fonts() {
	$fonts = [
		[
			'font' => 'Poppins',
			'weights' => [400, 700]
		]
	];
	return apply_filters('u_get_fonts', $fonts);
}

/**
 * Add Google font
 */
function u_favicon_head() {
	$fonts = u_get_fonts();
	if($fonts):
	$fonts_var = [];
	foreach($fonts as $font) {
		$fonts_var[] = 'family=' . str_replace(' ', '+', $font['font']) . ':wght@' . implode(';', $font['weights']);
	}
	?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?<?php echo implode('&', $fonts_var); ?>&display=swap" rel="stylesheet">
	<?php
	endif;
}
add_action( 'wp_head', 'u_favicon_head' );
add_action( 'admin_head', 'u_favicon_head' );

/**
 * Social links
 */
function u_get_social_links() {
	$social = [
		'twitter' => '#',
		'linkedin' => '#',
		'youtube' => ''
	];
	return apply_filters('u_get_social_links', $social);
}

/**
 * WooCommerce file
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 */
if ( class_exists( 'woocommerce' ) ) {
	require_once 'inc/woocommerce/global.php';
}
