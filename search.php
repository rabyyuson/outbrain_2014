<?php

/**
 * Search Template
 *
 * The template view for the search
 * @url: www.outbrain.com/?s={query}
 *
 * -----------------------------------------------------------------------------
 */

get_template_part( 'inc/templates/blog/header', get_post_format() ); ?>
<div class="container content search" role="main">
    <div class="row">
        <div class="inner clearfix">
            <div class="columns eight blog-posts">
                <?php \Outbrain\Classes\Core\Functions::get_header_featured_promotion( 'search_index' ); ?>
                <h2 class="search-title">Search Results For: <span><?php echo get_search_query(); ?></span></h2>
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