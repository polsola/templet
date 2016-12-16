<?php

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
    $current_user   = wp_get_current_user();
    $role_name      = $current_user->roles[0];
 
    if ( 'subscriber' === $role_name ) {
        wp_redirect( get_bloginfo('wpurl') . '/dashboard' );
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