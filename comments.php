<?php

/**
 * Comments Template
 *
 * The template for displaying the comments on the blog post detail page.
 * @url: www.outbrain.com/blog/{post-name}
 *
 * -----------------------------------------------------------------------------
 */

if ( post_password_required() ) { return; }
$comment_form_args = array(
    'id_form'           => 'commentform',
    'id_submit'         => 'submit',
    'title_reply'       => __( 'Add A Comment' ),
    'title_reply_to'    => __( 'Leave a Reply to %s' ),
    'cancel_reply_link' => __( 'Close' ),
    'label_submit'      => __( 'Submit' ),

    'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
        '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
        '</textarea></p>',

    'must_log_in' => '<p class="must-log-in">' .
        sprintf(
            __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
            wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
        ) . '</p>',

    'logged_in_as' => '<p class="logged-in-as">' .
        sprintf(
            __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
            admin_url( 'profile.php' ),
            $user_identity,
            wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
        ) . '</p>',

    'comment_notes_before' => '<p class="comment-notes">' .
        __( '<span class="required">*</span> Your email address will not be published. All fields are required.' ) . ( $req ? $required_text : '' ) .
    '</p>',

    'comment_notes_after' => null,

    'fields' => apply_filters( 'comment_form_default_fields', array(
        'author' =>
            '<div class="comment-form-author">' .
            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '" size="30"' . $aria_req . ' placeholder="Name" /></div>',

        'email' =>
            '<div class="comment-form-email"><label for="email">' .
            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' placeholder="Email" /></div>',

    ) ),

    'comment_field' => '<div class="comment-form-comment">' .
        '<textarea id="comment" name="comment" aria-required="true" cols="45" rows="8" placeholder="Type your comment here."></textarea></div>'
);
// Display the comments form.
comment_form($comment_form_args, $post->ID);
if ( have_comments() ) : ?>
    <ul class="comment-list">
        <?php
            wp_list_comments( array(
                'type' => 'comment',
                'callback' => function( $comment, $args, $depth ) { ?>
                    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
                        <div id="comment-<?php comment_ID(); ?>">
                            <div class="comment-avatar">
                                <?php echo get_avatar( $comment, 50 ); ?>
                            </div>
                            <div class="comment-body">
                                <div class="comment-meta">
                                    <?php printf(__('<span class="author">%s</span><span class="separator">|</span>'), get_comment_author_link()) ?>
                                    <span class="date"><?php echo esc_html( mysql2date('F j, Y \a\t g:HA', $comment->comment_date) ); ?></span>
                                </div>
                                <div class="comment-content">
                                    <?php comment_text() ?>
                                </div>
                            </div>
                            <div class="reply">
                                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                            </div>
                        </div>
                    </li>
            <?php }
            ) );
        ?>
    </ul>
    <?php if ( ! comments_open() ) : ?>
        <p class="no-comments">Comments are closed</p>
    <?php endif; ?>
<?php 
endif;