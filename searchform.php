<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 * @version 1.0
 */

?>
<form role="search" method="get" class="search-form input-group flex overflow-hidden items-stretch rounded-full" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="rounded-none appearance-none search-field input-group-field w-full pl-6 py-2" placeholder="<?php _e( 'Search products', 'templet' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<input type="hidden" name="post_type" value="product" />
	<button type="submit" class="search-submit px-4" aria-label="Buscar">
		<?php tm_icon('search', '36', 'w-6 h-6'); ?>
		<span class="sr-only"><?php _e( 'Search', 'templet' ); ?></span>
	</button>	
</form>
