<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the site content and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 * @version 1.0
 */

?>
				</main>
				<footer class="footer">
					<div class="footer__credits">
						<div class="row">
							<div class="medium-6 columns">
								© <?php echo date('Y'); ?> <?php _e('All rights reserved', 'templet'); ?>
							</div>
							<div class="medium-6 columns">
								<nav class="footer__credits__nav">
	                <?php
	                wp_nav_menu( array(
	                    'sort_column'     => 'menu_order',
	                    'container'       => false,
	                    'menu_class'      => 'menu',
	                    'theme_location'  => 'footer',
	                    'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown>%3$s</ul>'
	                    )
	                );
	                ?>
								</nav>
							</div>
						</div>
					</div>
				</footer>
			</div><!-- END .off-canvas-content -->
		</div><!-- END .off-canvas-wrapper -->
	<?php wp_footer(); ?>
	</body>
</html>
