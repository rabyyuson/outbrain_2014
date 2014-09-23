<?php

/**
 * Category Template
 *
 * The category single page. Display information about the selected category.
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container blog categories-single" role="main">
    <?php
        // Reference the about page template navigation menu
        include_once( TEMPLATEPATH . '/inc/templates/blog/navigation.php' );
    ?>
    <div class="row content">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h1>Test Here Categories</h1>
                <?php
                
                    // Loop through the posts and show them
                    if ( have_posts() ) :
                        
                        // Pull the view template for displaying the post data
                        while ( have_posts() ) : the_post();
                            get_template_part( 'inc/templates/blog/content', get_post_format() );
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
//                    get_template_part( 'inc/templates/sidebar/sidebar-primary' );
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();