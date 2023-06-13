<div class="header__upper hidden lg:block text-sm bg-gray-100 py-2">
	<div class="container mx-auto flex gap-4 items-center">
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
		<?php get_template_part('template-parts/social/icons'); ?>
	</div>
</div>