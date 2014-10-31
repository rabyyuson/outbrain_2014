<?php

/**
 * Main Template (Wrapper)
 *
 * The wrapper for the content templates view
 * @url: www.outbrain.com/blog
 *
 * -----------------------------------------------------------------------------
 */

get_template_part( 'inc/templates/blog/header', get_post_format() ); ?>
<div class="container content" role="main">
    <div class="row">
        <div class="inner clearfix">
            <div class="columns eight blog-posts">
                <?php \Outbrain\Classes\Core\Functions::get_header_featured_promotion( 'post_index' ); ?>
                <div class="featured-posts">
                    <div class="loading">Loading Featured Posts...<img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/ajax-loader-featured.gif" /></div>
                    <article style="display:none;">
                        <div class="thumbnail">
                            <div class="image">
                                Post Thumbnail...
                            </div>
                            <div class="social">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" target="_blank">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-facebook.png" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" target="_blank">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-twitter.png" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" target="_blank">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-googleplus.png" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" target="_blank">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-linkedin.png" />
                                        </a>
                                    </li>
                                </ul>
                                <div class="count">0 Shares</div>
                            </div>
                        </div>
                        <div class="information">
                            <h1 class="title">
                                <a href="#">
                                    Post Title...
                                </a>
                            </h1>
                            <div class="meta">
                                <time>
                                    Formatted Time...
                                </time>
                                <div class="author">
                                    <a href="#">
                                        The Author Name...
                                    </a>
                                </div>
                            </div>
                            <div class="content">
                                <div class="excerpt">
                                    Post Content...
                                </div>
                                <a href="#">Read More &raquo;</a>
                            </div>
                        </div>
                    </article>
                </div>
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