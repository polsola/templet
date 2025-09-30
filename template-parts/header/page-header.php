<?php 

$title = apply_filters('u_custom_page_header_title', get_the_title());

$excerpt = '';
if( has_excerpt() ) {
	$excerpt = get_the_excerpt();
}
$excerpt = apply_filters('u_custom_page_header_excerpt', $excerpt);

$css_class = apply_filters('u_custom_page_header_css_class', ['page-header']);
?>
<div class="<?php echo esc_attr(implode(' ', $css_class)); ?>">
	<div class="container">
		<?php do_action('u_page_header_before_content'); ?>
		<h1><?php echo $title; ?></h1>
		<?php if ($excerpt) : ?>
			<p class="page-header__excerpt"><?php echo $excerpt; ?></p>
		<?php endif; ?>
		<?php do_action('u_page_header_actions'); ?>
	</div>
</div>