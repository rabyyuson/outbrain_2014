<?php

/**
 * Template Name: Archives
 *
 * The template for the archives page
 * @url: www.outbrain.com/blog/archives
 *
 * -----------------------------------------------------------------------------
 */

get_template_part( 'inc/templates/blog/header', get_post_format() ); ?>
<div class="container content" role="main">
    <div class="row">
        <div class="inner clearfix">
            <div class="columns two">
                <?php \Outbrain\Classes\Core\Functions::get_archives(); ?>
            </div>
            <div class="columns six">
                <?php 
                    
                    // Get posts for this month
                    // This is only show for the archives listing page
                    // Once the user clicks on any of the archives month date,
                    // it will serve the appropriate monthly posts
                    $today = getdate();
                    $archive_posts = new WP_Query( 'year=' . $today['year'] . '&monthnum=' . $today['mon'] );
                    
                    // Loop through the posts and show them
                    if ( $archive_posts->have_posts() ) :
                        // Pull the view template for displaying the post data
                        while ( $archive_posts->have_posts() ) : $archive_posts->the_post();
                            get_template_part( 'inc/templates/blog/home', get_post_format() );
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