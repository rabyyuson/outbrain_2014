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
                <ul class="listings">
                    <?php
                    
                        // Get all categories.
                        $categories = get_categories( array( 'orderby' => 'slug' ) );
                        
                        // Loop through all the categories and get its sub-categories.
                        // Show the sub-categories label if there are sub-categories items.
                        foreach( $categories as $k => $v ):  ?>
                            <li class="parent">
                                <a class="parent-link" href="<?php echo get_category_link( $v->term_id ); ?>">
                                    <?php echo $v->name; ?>
                                </a>
                                <div class="sub-categories">
                                    <h3 <?php echo \Outbrain\Classes\Core\Functions::get_sub_categories( $categories, $v, 'bool' ); ?>>Sub-Categories:</h3>
                                    <ul>
                                        <?php \Outbrain\Classes\Core\Functions::get_sub_categories( $categories, $v, 'value' ); ?>
                                    </ul>
                                </div>
                            </li>
                    <?php 
                        endforeach; ?>
                </ul>
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