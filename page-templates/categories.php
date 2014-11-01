<?php

/**
 * Template Name: Categories
 *
 * The template for the categories page
 * @url: www.outbrain.com/blog/categories
 *
 * -----------------------------------------------------------------------------
 */

get_template_part( 'inc/templates/blog/header', get_post_format() ); ?>
<div class="container content categories" role="main">
    <div class="row">
        <div class="inner clearfix">
            <div class="columns eight">
                <?php 
                    // Get featured promotion box
                    \Outbrain\Classes\Core\Functions::get_header_featured_promotion( 'category_index' );
                ?>
                <div class="listings">
                    Show the category lists here...
                </div>
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