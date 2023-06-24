<?php
/**
 * The page template
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php wp_link_pages(); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
