<?php
/**
 * Templet: Page Header
 *
 * Functions related to the frontend page header module
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 */

/**
 * Build & render page header
 */
function tm_page_header() 
{
	?>
	<section class="page-header">
		<div class="page-header__content">
			<?php do_action('tm_page_header_before_title'); ?>
			<h1><?php do_action('tm_page_header_title'); ?></h1>
			<?php do_action('tm_page_header_after_title'); ?>
		</div>
		<div class="page-header__bg" data-interchange="['<?php echo TM_STATIC; ?>/images/page-header.jpg', small]">
		</div>
	</section>
	<?php
}

/**
 * Get page title depending on current page
 */
function tm_get_page_title() 
{

	$title = '';
	global $post;
	
	if( is_archive() ) {
        $title = post_type_archive_title( '', false );
    }

    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } elseif( is_month() ) {
        $title = single_month_title(' ', false);
    }

    if ( is_search() ) {
        $title = sprintf( __( 'Search Results for &#8220;%s&#8221;', 'templet' ), get_search_query() );
    }

    if( is_home() ) {
        $title = get_the_title( get_option('page_for_posts', true) );
    }
    if( is_page() ) {
        $title = get_the_title($post->ID);
    }
    if( is_single() ) {
        $title = get_the_title($post->ID);
    }

    return $title;
}

/**
 * Just echo 'tm_get_page_title' function
 */
function tm_page_title() 
{
	echo tm_get_page_title();
}

/**
 * Hook into 'tm_page_header_title' to add the current page title
 */
add_action('tm_page_header_title', 'tm_page_title');