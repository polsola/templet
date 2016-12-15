<?php

require_once 'inc/backend.php';
require_once 'inc/frontend.php';

 
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
 * Enqueue scripts and styles.
 */
function idols_scripts()
{

	wp_enqueue_style( 'app', get_template_directory_uri() . '/static/css/app.css' );

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Mountains+of+Christmas:700|Croissant+One|Roboto:400,700' );

	wp_enqueue_script( 'jquery' );
   	wp_register_script( 'app', get_template_directory_uri() . '/static/scripts/app.js', array('jquery'), '1.0', true );
	$variables_array = array(
    	'site_url' => get_bloginfo('wpurl')
    );
    wp_localize_script( 'app', 'wp_vars', $variables_array );
    wp_enqueue_script( 'app' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'idols_scripts' );