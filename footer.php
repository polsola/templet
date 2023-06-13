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
				<?php get_template_part('template-parts/footer/off-canvas'); ?>
				<?php do_action( 'tm_before_footer' ); ?>
				<footer class="footer bg-slate-700 text-slate-200">
					<div class="footer__widgets container mx-auto py-4 px-4">
						<div class="grid md:grid-cols-4">
							<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
								<?php dynamic_sidebar( 'Footer ' . $i ); ?>
							<?php endfor; ?>
						</div>
					</div>
					<div class="footer__credits container mx-auto py-4 px-4">
						<div class="grid gap-4 md:grid-cols-2 text-sm items-center">
							<?php
								wp_nav_menu( array(
									'sort_column'     => 'menu_order',
									'container'       => 'nav',
									'container_class' => 'footer__credits__nav',
									'menu_class'      => 'flex justify-center items-center md:justify-start gap-2',
									'theme_location'  => 'footer'
									)
								);
								?>
							<p class="footer__credits__text md:text-right">
								© <?php echo esc_html( date( 'Y' ) ); ?> 
								<?php esc_html_e( 'All rights reserved', 'templet' ); ?>. 
								<?php printf(__( 'Website created by %s', 'templet' ), '<a class="text-primary" href="https://www.utrans.global" title="Utrans" target="_blank">Utrans</a>'); ?>
							</p>
						</div>
					</div>
				</footer>
	<?php wp_footer(); ?>
	</body>
</html>
