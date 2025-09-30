<div class="header__upper hidden lg:block text-sm bg-gray-100">
	<div class="container mx-auto flex gap-4 items-center px-4 py-2">
		<?php
			wp_nav_menu( array(
				'sort_column'     => 'menu_order',
				'container'       => 'nav',
				'container_class' => 'header__upper__nav flex-grow',
				'menu_class'      => 'menu',
				'theme_location'  => 'secondary',
				)
			);
		?>
	</div>
</div>