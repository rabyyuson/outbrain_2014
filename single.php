<?php

/**
 * Blog Single Post Detail Page
 *
 * The template for displaying the blog post detail page.
 * @url: www.outbrain.com/blog/{slug}
 *
 * -----------------------------------------------------------------------------
 */

get_template_part( 'inc/templates/blog/header', get_post_format() ); ?>
<div class="container content" role="main">
    <div class="row">
        <div class="inner clearfix">
            <div class="columns eight">
                <div class="OUTBRAIN" data-src="permalink" data-widget-id="SL_1" data-ob-template="outbrain" ></div>
                <?php 
                    \Outbrain\Classes\Core\Functions::get_header_featured_promotion( 'post_single' );
                    // Loop through the posts and show them
                    if ( have_posts() ) :
                        // Pull the view template for displaying the post data
                        while ( have_posts() ) : the_post();
                            get_template_part( 'inc/templates/blog/single', get_post_format() );
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
<?php get_template_part( 'inc/templates/blog/footer', get_post_format() );