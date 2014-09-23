<?php

/**
 * Template Name: Terms of Use
 *
 * The template for the terms of use page
 * @url: www.outbrain.com/legal/tos
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container legal terms-of-use" role="main">
    <div class="row hero">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="details">
                    <h1><?php echo strtoupper( $post->post_title ); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <?php
        // Reference the legal page template navigation menu
        include_once( TEMPLATEPATH . '/inc/templates/page-templates/legal/navigation.php' );
    ?>
    <div class="row content">
        <div class="inner clearfix">
            <div class="columns twelve">
                <article>
                    <?php
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                    ?>
                </article>
            </div>
        </div>
    </div>
</div>
<?php get_footer();