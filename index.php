<?php
/**
 * The main template, displays blog posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<section class="section">
	<div class="row">
		<div class="large-8 columns">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('template-parts/loop'); ?>
			<?php endwhile; ?>
			<?php tm_pagination(); ?>
			<?php endif; ?>
		</div>
		<div class="large-4 columns show-for-large">
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
