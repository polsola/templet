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

<article <?php post_class('max-w-4xl mx-auto px-4 my-8'); ?>>
	<h1 class="mb-8"><?php the_title(); ?></h1>
	<div class="single__thumbnail"> 
		<?php the_post_thumbnail( 'large',  [
			'class' => 'mb-8 block w-full'
		]); ?>
	</div>
	<div class="single-post__content">
		<?php the_content(); ?>
	</div>
</article>
<section class="section py-8">
	<div class="max-w-4xl mx-auto px-4 relative z-1">
		<div class="flex items-center mb-8">
		<p class="text-xl flex-grow mb-0"><?php _e('Keep reading', 'templet'); ?></p>
		<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="button" title="<?php _e('View all', 'templet'); ?>">
			<?php _e('View all', 'cinc'); ?>
		</a>
		</div>
		<div class="single__nav">
			<div class="grid md:grid-cols-2 gap-12">
				<?php 
				$prev_post = get_previous_post();
				$next_post = get_next_post();
				if( $prev_post ) :
					$post = $prev_post;
					setup_postdata($post);
					get_template_part('template-parts/content/post');
				endif;
				global $post;
				if($next_post) :
					$post = $next_post;
					setup_postdata($post);
					get_template_part('template-parts/content/post');
				endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer();
