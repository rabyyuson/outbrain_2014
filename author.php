<?php

/**
 * Author Template
 *
 * The author single page. Display information about the selected author.
 * @url: www.outbrain.com/blog/author/{slug}
 *
 * -----------------------------------------------------------------------------
 */

get_template_part( 'inc/templates/blog/header', get_post_format() ); ?>
<div class="container content authors author" role="main">
    <div class="row">
        <div class="inner clearfix">
            <div class="columns eight blog-posts">
                <div class="listings">
                    <div class="listing">
                        <?php 

                            // Filter the users by the following criteria:
                            // a. Do not get users with no post or post count is zero
                            // b. Get "outbrainer" users with an outbrain.com email
                            // c. Get "guest" users without an outbrain.com email

                            $user = get_user_by( 'id', $post->post_author );
                            \Outbrain\Classes\Core\Functions::get_authors_by_group( array( $user ) );
                        ?>
                    </div>
                </div>
                <div class="author-articles">
                    <span>Articles by this Author</span>
                </div>
                <?php            
                    // Loop through the posts and show them
                    if ( have_posts() ) :
                        // Pull the view template for displaying the post data
                        while ( have_posts() ) : the_post();
                            get_template_part( 'inc/templates/blog/author', get_post_format() );
                        endwhile;
                        // Get the pagination links
                        echo \Outbrain\Classes\Core\Functions::get_pagination();
                    else :
                        // If no content, include the "No posts found" template.
                        get_template_part( 'inc/templates/blog/none', 'none' );
                    endif;
                ?>
            </div>
            <div class="columns four">
                <?php
                    // Get the right content sidebar.
                    get_template_part( 'inc/templates/blog/sidebar-right' );
                ?>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); get_template_part( 'inc/templates/blog/footer', get_post_format() );