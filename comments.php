<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Templet
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() || (!comments_open() && get_comments_number()))
	return;
?>

<div id="comments" class="comments-area">
    <a name="comments"></a>
    <?php if (have_comments()) : ?>
    
    <ol class="comment-list">
        <?php
        wp_list_comments(array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 0,
            'format'      => 'html5',
            'walker'        => new Templet_Walker_Comment
        ));
        ?>
    </ol>
    
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')): ?>
    <div class="navigation">
        <div class="nav-previous"><?php previous_comments_link() ?></div>
        <div class="nav-next"><?php next_comments_link() ?></div>
    </div>
    <?php endif; ?>

    <?php endif; ?>

    <?php

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );

    $fields =  array(

      'author' =>
        '<div class="row"><div class="medium-4 columns"><p class="comment-form-author"><label for="author">' . __( 'Name', 'wayo' ) . 
        ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
        '" size="30"' . $aria_req . ' /></label></p></div>',

      'email' =>
        '<div class="medium-4 columns"><p class="comment-form-email"><label for="email">' . __( 'Email', 'wayo' ) . 
        ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
        '" size="30"' . $aria_req . ' /></label></p></div>',

      'url' =>
        '<div class="medium-4 columns"><p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) .
        '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
        '" size="30" /></label></p></div></div>'
    );

    comment_form(array(
        'format'                => 'html5',
        'comment_notes_before'  => '',
        'comment_notes_after'   => '',
        'fields'                => $fields
    ));
    ?>

</div><!-- #comments -->