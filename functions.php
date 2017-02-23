<?php

define('TM_THEME', get_stylesheet_directory_uri());
define('TM_STATIC', TM_THEME . '/static');

require_once 'inc/backend.php';
require_once 'inc/frontend.php';
require_once 'inc/login.php';
require_once 'inc/page-header.php';

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
 * Registers a widget area.
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 */
function tm_widgets_init()
{
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'templet' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'templet' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget__title">',
		'after_title'   => '</h4>',
	) );
}

add_action( 'widgets_init', 'tm_widgets_init' );
