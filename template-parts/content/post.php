<?php
/**
 * The loop
 *
 * Template used to display the current article inside the loop
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 * @version 1.0
 */

?>
<article <?php post_class( 'loop' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail('large'); ?>
	<?php endif; ?>
	<span class="loop__date"><?php the_date(); ?></span>
	<h2 class="loop__title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<?php the_excerpt(); ?>
</article>
