<div class="share share--mobile hide-for-medium">
	<ul>
		<li class="share__item share__item--facebook"><a href="<?php echo tm_share('facebook', get_permalink()); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li class="share__item share__item--twitter"><a href="<?php echo tm_share('twitter', get_permalink()); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<li class="share__item share__item--google-plus"><a href="<?php echo tm_share('google-plus', get_permalink()); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
		<li class="share__item share__item--whatsapp"><a href="<?php echo tm_share('whatsapp', get_permalink()); ?>" target="_blank" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a></li>
	</ul>
</div>
<div class="share share--desktop show-for-medium">
	<div class="row">
		<div class="small-12 columns">
			<ul>
				<li class="share__text show-for-large"><?php printf( __('Share %s ', 'tm'), '<strong>' . get_the_title() . '</strong>'); ?></li>
				<li class="share__item share__item--facebook"><a href="<?php echo tm_share('facebook', get_permalink()); ?>" target="_blank"><i class="fa fa-facebook"></i><span class="share-on-text"><?php printf( __('Share on %s', 'tm'), 'Facebook'); ?></span></a></li>
				<li class="share__item share__item--twitter"><a href="<?php echo tm_share('twitter', get_permalink()); ?>" target="_blank"><i class="fa fa-twitter"></i><span class="share-on-text"><?php printf( __('Share on %s', 'tm'), 'Twitter'); ?></span></a></li>
				<li class="share__item share__item--google-plus"><a href="<?php echo tm_share('google-plus', get_permalink()); ?>" target="_blank"><i class="fa fa-google-plus"></i><span class="share-on-text"><?php printf( __('Share on %s', 'tm'), 'Google Plus'); ?></span></a></li>
			</ul>
		</div>
	</div>
</div>