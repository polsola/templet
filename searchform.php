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
	<button type="submit" class="search-submit bg-white px-4" aria-label="Buscar">
		<?php tm_icon('search', '36', 'w-8 h-8'); ?>
		<span class="sr-only">Buscar</span>
	</button>	
	<input type="search" class="rounded-none appearance-none search-field input-group-field w-full pr-4 py-2 text-black" placeholder="<?php _e( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<input type="hidden" name="post_type" value="product" />
</form>
