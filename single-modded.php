<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mbk
 */

get_header(); ?>

<?php
while ( have_posts() ) : the_post();

	// get_template_part( 'template-parts/content', get_post_format() );
	get_template_part( 'template-parts/content', 'post' );

	// the_post_navigation();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :

			// comments_template();
	    $commenter = wp_get_current_commenter();
	    $req = get_option( 'require_name_email' );
	    $aria_req = ( $req ? " aria-required='true'" : '' );
	    $fields =  array(
	      'author' => '<section class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="comment-form-required">*</span>' : '' ) .
	          '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></section>',
	      'email'  => '<section class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span class="comment-form-required">*</span>' : '' ) .
	          '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></section>'
	    );

	    $comments_args = array(
	      'format' => 'html5',
	      'fields' =>  $fields,
	      'title_reply_before' => '<p class="comment-title">',
	      'title_reply_after' => '</p>',
	      'title_reply'=> __( 'Please Leave Me Your Thoughts' ),
	      'comment_notes_before' => '<p class="comment-form-notes">' . __('Fields with an * are required.') . ( $req ? $required_text : '') . '</p>',
	      'comment_field' =>  '<section class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
	          '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
	          '</textarea></section>',
	      'label_submit' => 'Post My Comment',
	      'class_submit' => 'comment-form-submit-button',
	  		'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
	  		'submit_field' => '<section class="comment-form-submit">%1$s %2$s</section>'
	    );

	    comment_form($comments_args);
	    // comment_form();
		endif;

endwhile; // End of the loop.
?>

<?php

get_footer();
