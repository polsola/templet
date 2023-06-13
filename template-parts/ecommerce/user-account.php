<a title="<?php _e('My account', 'templet'); ?>" class="header__main__item" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
	<?php tm_icon('user', 24, 'w-8 h-8'); ?>
	<span  class="header__main__item__label hidden">
		<?php if(is_user_logged_in()): 
			$current_user = wp_get_current_user();
			echo $current_user->display_name;
			else: ?>
			<?php _e('My account', 'templet'); ?>
		<?php endif; ?>
	</span>
</a>