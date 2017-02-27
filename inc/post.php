<?php

function tm_post_header_before_title() {
	global $post;

	if( is_single() ) {
		?>
		<div class="menu-centered">
			<ul class="menu">
				<li><?php the_category(', '); ?></li>
				<li><?php echo get_the_date(); ?></li>
			</ul>
		</div>
		<?php
	}
}


add_action('tm_page_header_before_title', 'tm_post_header_before_title');