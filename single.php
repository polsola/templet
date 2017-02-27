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
	<div class="row small-12 columns">
		<article <?php post_class(); ?>>
			<h1><?php the_title(); ?></h1>

			<?php the_category(); ?>
			<?php the_date(); ?>
			
			<div class="post__thumbnail"> 
				<?php the_post_thumbnail( array(1100, 420) ); ?>
			</div>
			
			<?php the_content(); ?>
			<footer class="entry-footer">
                <p><?php the_tags( __('Tags', 'templet').': ' , ', ' ); ?></p>
            </footer>
			<?php if ( comments_open() || get_comments_number() ) {  ?>
                <div class="entry-comments">
                    <?php if( get_comments_number() != 0 ): ?>
                        <h3><?php _e('Comments', 'templet'); ?></h3>
                    <?php endif; ?>
                    <?php comments_template(); ?>
                </div>
            <?php }; ?>
		</article>
	</div>
</main>

<?php endwhile; endif; ?>
<?php get_footer();