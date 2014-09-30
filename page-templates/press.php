<?php

/**
 * Template Name: Press
 *
 * The template for the press page
 * @url: www.outbrain.com/about/press
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container about press" role="main">
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
        // Reference the about page template navigation menu
        include_once( TEMPLATEPATH . '/inc/templates/page-templates/about/navigation.php' );
    ?>
    <div class="row listing navigation-clip">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">Press Lorem Ipsum</h2>
                <p class="description">
                    Here's a selection of what people have had to say about us. For press inquiries, here's the best way to <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact' ) ) ); ?>">contact us</a>.
                </p>
                <ul class="entries">
                <?php
                
                    // Create a new WP_Query object and pass it the 'press' post type
                    // Check first if the plugin is activated before pulling the data
                    // Loop through the 'press' post type content and display it
                
                    $posts = new WP_Query( array (
                        'post_type' => 'press',
                        'posts_per_page' => 6,
                        'paged' => ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 )
                    ) ); 
                    foreach( $posts->posts as $k => $v ):
                        if( function_exists( 'get_fields' ) ):
                            $content = get_fields( $v->ID );
                ?>
                            <li>
                                <a href="<?php echo $content['link']; ?>" target="_blank" class="entry">
                                    <img class="image" src="<?php echo $content['image']; ?>" />
                                    <div class="copy">
                                        <div class="date">
                                            <?php echo mysql2date( get_option('date_format'), $v->post_date ); ?>
                                        </div>
                                        <div class="title">
                                            <?php echo $v->post_title; ?>
                                        </div>
                                        <div class="body">
                                            <?php echo strip_tags( $content['content'] ); ?>
                                        </div>
                                    </div>
                                </a>
                            </li>
                <?php
                        else:
                            echo 'Please activate the Advanced Custom Fields plugin first!';
                        endif;
                    endforeach;
                ?>
                    <div class="more">
                        <a href="javascript:void(0)">See More Articles</a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php get_footer();