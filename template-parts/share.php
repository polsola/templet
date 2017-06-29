<?php
/**
 * Share buttons
 *
 * Share buttons template with Fb, Tw, G+ & Wthp
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 * @version 1.0
 */

// translators: The title of the article / product beeing shared.
$share_text = __( 'Share %s ', 'templet' );
// translators: The Social network name where the article / product beeing shared.
$share_on_text = __( 'Share on %s', 'templet' )
?>
<div class="share share--mobile hide-for-medium">
	<ul>
		<li class="share__item share__item--facebook"><a href="<?php echo esc_url( tm_share( 'facebook', get_permalink() ) ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li class="share__item share__item--twitter"><a href="<?php echo esc_url( tm_share( 'twitter', get_permalink() ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<li class="share__item share__item--google-plus"><a href="<?php echo esc_url( tm_share( 'google-plus', get_permalink() ) ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
		<li class="share__item share__item--whatsapp"><a href="<?php echo esc_url( tm_share( 'whatsapp', get_permalink() ) ); ?>" target="_blank" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a></li>
	</ul>
</div>
<div class="share share--desktop show-for-medium">
	<div class="row">
		<div class="small-12 columns">
			<ul>
				<li class="share__text show-for-large"><?php printf( esc_html( $share_text ), '<strong>' . get_the_title() . '</strong>' ); ?></li>
				<li class="share__item share__item--facebook"><a href="<?php echo esc_url( tm_share( 'facebook', get_permalink() ) ); ?>" target="_blank"><i class="fa fa-facebook"></i><span class="share-on-text"><?php printf( esc_html( $share_on_text ), 'Facebook' ); ?></span></a></li>
				<li class="share__item share__item--twitter"><a href="<?php echo esc_url( tm_share( 'twitter', get_permalink() ) ); ?>" target="_blank"><i class="fa fa-twitter"></i><span class="share-on-text"><?php printf( esc_html( $share_on_text ), 'Twitter' ); ?></span></a></li>
				<li class="share__item share__item--google-plus"><a href="<?php echo esc_url( tm_share( 'google-plus', get_permalink() ) ); ?>" target="_blank"><i class="fa fa-google-plus"></i><span class="share-on-text"><?php printf( esc_html( $share_on_text ), 'Google Plus' ); ?></span></a></li>
			</ul>
		</div>
	</div>
</div>
