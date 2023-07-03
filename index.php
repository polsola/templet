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
	<div class="container mx-auto">
		<h1 class="text-center my-8"><?php single_post_title(); ?></h1>
		<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content/post' ); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
	<?php tm_pagination(); ?>
</section>
<?php get_footer(); ?>
