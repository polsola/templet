<article <?php post_class('loop'); ?>>
	<?php if( has_post_thumbnail() ): ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="loop__thumbnail">
			<?php tm_the_post_thumbnail(); ?>
		</a>
	<?php endif; ?>
	<span class="loop__date"><?php the_date(); ?></span>
	<h2 class="loop__title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<?php the_excerpt(); ?>
	<a class="button small" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('Read more', 'templet'); ?></a>
</article>