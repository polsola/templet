<?php

$social = [
    'twitter' => '#',
    'linkedin' => '#'
]

?>
<ul class="social flex items-center gap-2">
    <?php foreach($social as $icon => $url): ?>
        <li class="social__item">
            <a class="block" href="<?php echo $url; ?>" target="_blank" rel="nofollow" title="<?php ucfirst($icon); ?>">
				<?php tm_icon($icon, 'w-6 h-6 fill-primary'); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>