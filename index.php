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

<div class="row small-12 column">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<span><?php the_date(); ?></span>
			<h1><?php the_title(); ?></h1>
			<?php the_excerpt(); ?>
		</article>
	<?php endwhile; ?>
	<?php tm_pagination(); ?>
	<?php endif; ?>

</div>

<?php get_footer(); ?>
