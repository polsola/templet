<div class="header__upper block text-sm bg-gray-100">
	<div class="container mx-auto flex gap-4 items-center px-4 py-2">
		<?php
			wp_nav_menu( array(
				'sort_column'     => 'menu_order',
				'container'       => 'nav',
				'container_class' => 'header__upper__nav hidden md:flex flex-grow',
				'menu_class'      => 'menu',
				'theme_location'  => 'secondary',
				)
			);
		?>
		<?php do_action( 'u_header_upper' ); ?>
	</div>
</div>