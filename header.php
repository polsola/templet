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
			<div class="header__main p-4 container mx-auto grid grid-cols-[72px_minmax(0,_1fr)_72px] gap-4 items-center lg:flex ">
				<div class="lg:hidden">
					<?php get_template_part('template-parts/header/mobile-toggle'); ?>
				</div>
				<a href="<?php echo get_home_url(); ?>" title="<?php bloginfo( 'title' ); ?>" class="header__brand"><?php bloginfo( 'title' ); ?></a>
				<div class="grow flex justify-end items-center gap-4">
					<nav class="header__nav flex items-center">
						<?php
						wp_nav_menu( array(
							'sort_column'     => 'menu_order',
							'container'       => false,
							'menu_class'      => 'menu',
							'theme_location'  => 'primary',
							)
						);
						?>
					</nav>
					<a class="button" href="#"><?php _e('Contact us', 'templet'); ?></a>
					<button class="header__search__toggle"><?php tm_icon('search', 24, 'w-5 h-5'); ?></button>
					<?php do_action( 'tm_header_main' ); ?>
				</div>
			</div>
			<div id="header-search" class="header__search">
				<?php get_search_form(); ?>
				<button class="header__search__close bg-secondary"><?php tm_icon('close', 24, 'w-8 h-8'); ?></button>
			</div>
			<?php do_action( 'tm_header_main_after' ); ?>
		</header>
		<?php do_action( 'tm_after_header' ); ?>
		<main>
