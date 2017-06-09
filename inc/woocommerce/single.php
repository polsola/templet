<?php

function tm_single_product_before()
{
	echo '<div class="row"><div class="medium-6 columns">';
}

add_action('woocommerce_before_single_product_summary', 'tm_single_product_before', 0);

function tm_single_product_after_image()
{
	echo '</div><!-- END .medium-6 --><div class="medium-6 columns">';
}

add_action('woocommerce_before_single_product_summary', 'tm_single_product_after_image', 100);

function tm_single_product_before_tabs()
{
	echo '</div><!-- END .medium-6 --></div><!-- END Summary .row -->';
}

add_action('woocommerce_after_single_product_summary', 'tm_single_product_before_tabs', 0);