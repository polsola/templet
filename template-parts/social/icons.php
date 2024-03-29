<?php

$social = tm_get_social_links();

?>
<ul class="social flex items-center gap-2">
	<?php foreach($social as $icon => $url): 
			if( !$url ) continue;
		?>
		<li class="social__item">
			<a class="block" href="<?php echo $url; ?>" target="_blank" rel="nofollow" title="<?php ucfirst($icon); ?>">
				<?php tm_icon($icon, 24, 'w-6 h-6'); ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
