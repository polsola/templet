<?php
/**
 * Templet: Login
 *
 * Functions to customize the look & feel of the login page and configure login redirections
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 */

/**
 * Enqueue styles & scripts to login
 */
function tm_login_stylesheet()
{
    wp_enqueue_style( 'tm-login', get_stylesheet_directory_uri() . '/static/css/login.css' );
    //wp_enqueue_script( 'tm-login', get_stylesheet_directory_uri() . '/static/scripts/login.js' );
}
add_action( 'login_enqueue_scripts', 'tm_login_stylesheet' );

/**
 * Change login url to WordPress home
 */
function tm_login_logo_url()
{
    return home_url();
}
add_filter( 'login_headerurl', 'tm_login_logo_url' );

/**
 * Change login url title attribute to WordPress site title
 */
function tm_login_logo_url_title()
{
    return get_bloginfo('title');
}
add_filter( 'login_headertitle', 'tm_login_logo_url_title' );

/**
 * Redirects users based on their role
 *
 * @uses wp_get_current_user()          Returns a WP_User object for the current user
 * @uses wp_redirect()                  Redirects the user to the specified URL
 */
function tm_redirect_users_by_role()
{
    if ( ! defined( 'DOING_AJAX' ) ) {
        $current_user   = wp_get_current_user();
        $role_name      = $current_user->roles[0];

        if ( 'subscriber' === $role_name ) {
            wp_redirect( site_url() . '/dashboard' );
        }
    }
}

//add_action( 'admin_init', 'tm_redirect_users_by_role' );

/**
 * Hide admin bar depending on role
 */
function tm_hide_admin_bar()
{
  if ( !current_user_can('edit_posts') ) {
    show_admin_bar(false);
  }
}
add_action('set_current_user', 'tm_hide_admin_bar');
