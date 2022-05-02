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
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
			<header id="header" class="header">
				<div class="header__main container mx-auto">
					<div class="lg:hidden">
						<?php get_template_part('template-parts/header/mobile-toggle'); ?>
					</div>
					<a href="<?php echo esc_url( site_url() ); ?>" title="<?php bloginfo( 'title' ); ?>" class="header__brand"><?php bloginfo( 'title' ); ?></a>
					<nav class="header__nav hidden lg:block flex-grow">
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
					<?php get_template_part('template-parts/social/icons'); ?>
				</div>
			</header>
			<?php do_action( 'tm_after_header' ); ?>
			<main>
						
