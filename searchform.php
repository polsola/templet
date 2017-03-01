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

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="search" id="<?php echo $unique_id; ?>" class="search-field input-group-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'tm' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<div class="input-group-button">
			<button type="submit" class="search-submit button">
				<i class="fa fa-search"></i>
				<span class="sr-only"><?php echo _x( 'Search', 'submit button', 'tm' ); ?></span>
			</button>
		</div>
	</div>
</form>
