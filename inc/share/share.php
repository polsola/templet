<?php
/**
 * Templet: Login
 *
 * Functions for the frontend share module
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 */

/**  
 * Share buttons url generator
 */
function tm_share( $type, $url, $text='')
{
    switch ($type) {
        case 'twitter':
            $share_url = 'https://twitter.com/intent/tweet?';
            $share_url .= http_build_query(array(
                'url' => $url,
                'text' => $text
            ));
            return $share_url;
            break;
        
        case 'facebook':
            $share_url = 'https://www.facebook.com/sharer/sharer.php?';
            $share_url .= http_build_query(array(
                'u' => $url
            ));
            return $share_url;
            break;
        case 'google-plus':
            $share_url = 'https://plus.google.com/share?';
            $share_url .= http_build_query(array(
                'url' => $url
            ));
            return $share_url;
            break;
        case 'whatsapp':
            $share_url = 'whatsapp://send?';
            $share_url .= http_build_query(array(
                'text' => $url
            ));
            return $share_url;
            break;
    }


    return '#';
}

/**  
 * Share buttons url generator
 */
function tm_add_share_footer()
{
    if( is_single() ): 
        get_template_part('template-parts/share'); 
    endif; 
}
add_action('wp_footer', 'tm_add_share_footer');