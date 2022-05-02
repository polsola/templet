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

<main class="section">
	<div class="grid-container grid-container-padded">
		<div class="grid-x">
			<div class="large-8 large-offset-2 cell">
				<article <?php post_class(); ?>>
					
					<div class="single__thumbnail"> 
						<?php the_post_thumbnail( array( 1100, 420 ) ); ?>
					</div>
					
					<?php the_content(); ?>
					<footer class="single__footer">
						<p class="single__footer__tags"><?php the_tags( __( 'Tags', 'templet' ) . ': ' , ' ' ); ?></p>
					</footer>
				</article>
			</div>
		</div>
	</div>
</main>

<?php endwhile;
endif; ?>
<?php get_footer();
