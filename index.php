<?php get_header(); ?>
<div class="row small-12 column">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article>
		<span><?php the_date(); ?></span>
		<h1><?php the_title(); ?></h1>
		<?php the_excerpt(); ?>
		</article>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>