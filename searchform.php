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
<form role="search" method="get" class="search-form input-group flex overflow-hidden items-stretch h-full" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="rounded-none appearance-none search-field input-group-field w-full pl-6 py-2" placeholder="<?php _e( 'Search', 'templet' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit px-4 grid place-items-center border-x border-secondary" aria-label="<?php _e( 'Search', 'templet' ); ?>">
		<?php tm_icon('search', 24, 'w-8 h-8'); ?>
		<span class="sr-only"><?php _e( 'Search', 'templet' ); ?></span>
	</button>	
</form>
