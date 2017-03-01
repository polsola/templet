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
				<article <?php post_class('loop'); ?>>
					<?php if( has_post_thumbnail() ): ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="loop__thumbnail">
							<?php tm_the_post_thumbnail(); ?>
						</a>
					<?php endif; ?>
					<span class="loop__date"><?php the_date(); ?></span>
					<h2 class="loop__title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
					<a class="button small" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('Read more', 'tm'); ?></a>
				</article>
			<?php endwhile; ?>
			<?php tm_pagination(); ?>
			<?php endif; ?>
		</div>
		<div class="large-4 columns">
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
