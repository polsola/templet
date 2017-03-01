<?php

define('TM_THEME', get_stylesheet_directory_uri());
define('TM_STATIC', TM_THEME . '/static');

/**
* Theme init 
*/
function tm_init()
{
    
	require_once 'inc/login.php';
	require_once 'inc/page-header.php';
	require_once 'inc/post.php';
	require_once 'inc/vendor.php';
	require_once 'inc/foundation-nav-walker.php';
    
    if (is_admin())
    {
        require_once 'inc/backend.php';
    }
    else
    {
        require_once 'inc/frontend.php';
    }
}
add_action('init', 'tm_init');

/**
* After setup theme
*/
function tm_setup()
{
	load_theme_textdomain( 'tm', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );


	add_theme_support( 'title-tag' );


	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' 	=> esc_html__( 'Primary', 'tm' ),
		'footer' 	=> esc_html__( 'Footer', 'tm' ),
	) );


	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
add_action( 'after_setup_theme', 'tm_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tm_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tm' ),
		'id'            => 'sidebar-blog',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'tm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget__title">',
		'after_title'   => '</h5>',
	) );

	register_sidebars(4, array(
		'name'          => __( 'Footer %d', 'tm' ),
		'id'            => 'sidebar-footer',
		'description'   => __( 'Add widgets here to appear in your footer.', 'tm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget__title">',
		'after_title'   => '</h5>',
	) );

}
add_action( 'widgets_init', 'tm_widgets_init' );

/**
 * WooCommerce file
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 */
require_once 'inc/woocommerce.php';
