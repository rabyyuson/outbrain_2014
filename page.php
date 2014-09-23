<?php

/**
 * Page Template (Wrapper)
 *
 * The wrapper for the page templates view
 * @url: www.outbrain.com/{pagename}
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container page" role="main">
    <div class="row hero">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="details">
                    <h1><?php echo strtoupper( $post->post_title ); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row content">
        <div class="inner clearfix">
            <div class="columns twelve">
                <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post();

                        // Include the page content template.
                        get_template_part( 'inc/templates/page/page', 'page' );

                    endwhile;
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();