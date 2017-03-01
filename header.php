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
		<div class="off-canvas-wrapper">
		    <div class="off-canvas position-left" id="off-canvas" data-off-canvas>
					<!-- Close button -->
			    <button class="close-button" aria-label="Close menu" type="button" data-close>
			      <span aria-hidden="true">&times;</span>
			    </button>
					<!-- Header nav -->
					<nav class="off-canvas__nav">
						<?php
						wp_nav_menu( array(
							'sort_column'     => 'menu_order',
							'container'       => false,
							'menu_class'      => 'menu vertical',
							'theme_location'  => 'primary',
							'items_wrap'      => '<ul id="%1$s" class="%2$s" data-drilldown>%3$s</ul>'
							)
						);
						?>
					</nav>
		    </div>
		    <div class="off-canvas-content" data-off-canvas-content>
					<header id="header" class="header">
						<div class="row">
							<div class="small-3 columns hide-for-large">
								<a data-toggle="off-canvas" class="header__toggle">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</a>
							</div>
							<div class="small-6 large-3 columns">
								<a href="<?php bloginfo('wpurl'); ?>" title="<?php bloginfo('title'); ?>" class="header__brand"><?php bloginfo('title'); ?></a>
							</div>
							<div class="large-9 columns show-for-large">
								<!-- Header nav -->
								<nav class="header__nav">
					                <?php
					                wp_nav_menu( array(
					                    'sort_column'     => 'menu_order',
					                    'container'       => false,
					                    'menu_class'      => 'menu',
					                    'theme_location'  => 'primary',
					                    'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown>%3$s</ul>',
					                    'walker'		  => new foundation_nav_walker()
					                    )
					                );
					                ?>
								</nav>
							</div>
						</div>
					</header>
					<main>
						<?php tm_page_header(); ?>
