<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package construct
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title"><?php comments_number( esc_html__('0 comment', 'construct'), esc_html__('1 comment', 'construct'), __('% comments', 'construct') ); ?></h2>
		<ol class="comment-list">
			<?php wp_list_comments('callback=construct_theme_comment'); ?>
			<?php
				// Are there comments to navigate through?
				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
				<nav class="navigation comment-navigation" role="navigation">		   
					<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'construct' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'construct' ) ); ?></div>
	                <div class="clearfix"></div>
				</nav><!-- .comment-navigation -->
			<?php endif; // Check for comment navigation ?>

			<?php if ( ! comments_open() && get_comments_number() ) : ?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'construct' ); ?></p>
			<?php endif; ?>	
		</ol>		
	<?php endif; ?>	

	
	<?php
    	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
		$aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
                'id_form' => 'reply-form',                                
                'title_reply'=> esc_html__('Leave a Reply', 'construct'),
                'fields' => apply_filters( 'comment_form_default_fields', array(
                    'author' => '<fieldset class="name-wrap"><input id="author" name="author" id="name" class="contact-input" type="text" value="" placeholder="'. esc_html__( 'Your Name', 'construct' ) .'" /></fieldset>',
                    'email' => '<fieldset class="email-wrap"><input id="author" name="email" id="name" class="contact-input" type="text" value="" placeholder="'. esc_html__( 'Your Email', 'construct' ) .'" /></fieldset>',
                ) ),                                
                 'comment_field' => '<fieldset class="message-wrap"><textarea style="height:230px;" name="comment" '.$aria_req.' id="comment-message" class="textarea-contact" placeholder="'. esc_html__( 'Your Comment', 'construct' ) .'" ></textarea></fieldset>',
                 'label_submit' => esc_html__( 'Post Comment', 'construct' ),
                 'comment_notes_before' => '',
                 'comment_notes_after' => '',   
                 'class_submit'      => 'ot-btn border-dark btn-contact',            
	        )
	    ?>
	    <?php comment_form($comment_args); ?>
	
</div>	

<!-- #comments -->
