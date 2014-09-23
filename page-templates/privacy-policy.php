<?php

/**
 * Template Name: Privacy Policy
 *
 * The template for the privacy policy page
 * @url: www.outbrain.com/legal/privacy-713
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container legal privacy-policy" role="main">
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