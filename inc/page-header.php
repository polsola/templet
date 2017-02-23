<?php

function tm_page_header() {
	?>
	<section class="page-header">
		<div class="page-header__content">
			<?php do_action('tm_page_header_before_title'); ?>
			<h1>Title</h1>
			<?php do_action('tm_page_header_after_title'); ?>
		</div>
		<div class="page-header__bg" data-interchange="['<?php echo TM_STATIC; ?>/images/page-header.jpg', small]">
		</div>
	</section>
	<?php
}