<div class="mobile__bg" id="off-canvas">
	<?php get_template_part('template-parts/header/mobile-toggle'); ?>
    <!-- Header nav -->
    <nav class="off-canvas__nav flex-grow">
        <?php
        wp_nav_menu( array(
            'sort_column'     => 'menu_order',
            'container'       => false,
            'menu_class'      => 'menu vertical',
            'theme_location'  => 'primary',
            'items_wrap'      => '<ul id="%1$s" class="%2$s" data-drilldown>%3$s</ul>',
            )
        );
        ?>
    </nav>
</div>