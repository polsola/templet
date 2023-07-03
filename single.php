<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article <?php post_class('max-w-4xl mx-auto my-8'); ?>>
	<h1 class="mb-8"><?php the_title(); ?></h1>
	<div class="single__thumbnail"> 
		<?php the_post_thumbnail( 'large',  [
			'class' => 'mb-8'
		]); ?>
	</div>
	<div class="single-post__content">
		<?php the_content(); ?>
	</div>
</article>

<?php endwhile; endif; ?>
<?php get_footer();
