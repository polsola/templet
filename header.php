<?php
/**
 * The header of the theme
 *
 * This is the template that displays all of the <head> section and everything until the start of dynamic content
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 * @version 1.0
 */

?><!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php do_action( 'tm_before_header' ); ?>
		<header id="header" class="header shadow">
			<?php do_action( 'tm_header_main_before' ); ?>
			<div class="header__main p-4 container mx-auto grid grid-cols-[100px_1fr_100px] gap-4 items-center lg:flex ">
				<div class="lg:hidden">
					<?php get_template_part('template-parts/header/mobile-toggle'); ?>
				</div>
				<a href="<?php echo get_home_url(); ?>" title="<?php bloginfo( 'title' ); ?>" class="header__brand"><?php bloginfo( 'title' ); ?></a>
				<div id="header__main__search" class="header__main__search col-span-3 md:col-span-4 lg:col-span-0 order-last lg:order-[inherit] w-full py-2 flex-grow flex flex-col justify-center lg:px-2">
					<?php get_search_form( true ); ?>
				</div>
				<?php do_action( 'tm_header_main' ); ?>
			</div>
			<?php do_action( 'tm_header_main_after' ); ?>
		</header>
		<?php do_action( 'tm_after_header' ); ?>
		<main>
