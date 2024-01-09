<?php

$cart = WC()->cart;
$count = $cart->cart_contents_count;
?>
	<a href="<?php echo wc_get_cart_url(); ?>" class="header__main__item header__main__item--cart m-0 flex place-items-center justify-center font-bold border-0" title="<?php esc_html_e( 'My cart', 'templet' ); ?>">
		<div class="header__main__item__icon w-8 h-8 relative">
			<?php echo apply_filters('tm_get_cart_icon', tm_get_icon('shopping-bag', 24, 'w-8 h-8')); ?>
			<?php if ( $count > 0 ) { ?>
				<span class="header__main__item__icon__count bg-primary rounded-full absolute -bottom-2 -right-2 w-6 h-6 grid place-items-center"><?php echo esc_html( $count ); ?></span>
			<?php } ?>
			</div>
		<span class="header__main__item__label hidden lg:block">
			<?php echo $cart->get_cart_total(); ?>
		</span>
	</a>
<?php