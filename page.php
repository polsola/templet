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

<div class="container mx-auto px-4">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php wp_link_pages(); ?>
<?php endwhile; ?>
<?php endif; ?>
</div>
<?php get_footer(); ?>
