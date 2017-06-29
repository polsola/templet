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
				<?php do_action( 'tm_before_footer' ); ?>
				<footer class="footer">
					<div class="footer__widgets">
						<div class="row">
							<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
								<div class="large-3 columns">
									<?php dynamic_sidebar( 'Footer ' . $i ); ?>
								</div>
							<?php endfor; ?>
						</div>
					</div>
					<div class="footer__credits">
						<div class="row">
							<div class="medium-6 columns">
								<p class="footer__credits__text">© <?php echo esc_html( date( 'Y' ) ); ?> <?php esc_html_e( 'All rights reserved', 'templet' ); ?></p>
							</div>
							<div class="medium-6 columns">
								<nav class="footer__credits__nav">
								<?php
								wp_nav_menu( array(
									'sort_column'     => 'menu_order',
									'container'       => false,
									'menu_class'      => 'menu',
									'theme_location'  => 'footer',
									'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown>%3$s</ul>',
									'walker'		  => new Foundation_Nav_Walker(),
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
