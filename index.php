<?php

/**
 * Main Template (Wrapper)
 *
 * The wrapper for the content templates view
 * @url: www.outbrain.com/blog
 *
 * -----------------------------------------------------------------------------
 */

//get_header(); ?>
<div class="container blog" role="main">
    <?php
        // Reference the about page template navigation menu
        include_once( TEMPLATEPATH . '/inc/templates/blog/navigation.php' );
    ?>
    <div class="row content-wrapper">
        <div class="inner clearfix">
            <div class="columns eight content">
                <?php
                    // Loop through the posts and show them
                    if ( have_posts() ) :
                        // Pull the view template for displaying the post data
                        while ( have_posts() ) : the_post();
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
            <div class="columns four sidebar">
                <?php
                    // Get the right content sidebar.
                    get_template_part( 'inc/templates/blog/sidebar-right' );
                ?>
            </div>
        </div>
    </div>
</div>
<?php // get_footer();