<?php

/**
 * Right Sidebar
 *
 * The primary right sidebar for the blog
 * @url: www.outbrain.com/blog
 *
 * -----------------------------------------------------------------------------
 */

?>
<div class="container">
    <div class="subscription">
        <h2>Get Weekly Content Marketing Tips</h2>
        <p>Subscribe to get weekly tips and insights directly to your inbox</p>
        <?php gravity_form( 15, false, false, false, null, true, 1 ); ?>
        <?php
            // Check to see if the current user is an admin and we are on single
            // page. If true, get the selected field options and store them in 
            // a javascript variable "post_options" used in single.js for checking
            if( current_user_can( 'activate_plugins' ) && is_single() ):
                if( function_exists( 'get_field' ) ): ?>
                    <script>
                        var post_options = [
                        <?php foreach( get_field( 'subscription_form_field_selection', $post->ID ) as $class_name ):
                            echo "'" . $class_name . "',";
                        endforeach; ?>
                        ]
                    </script>
        <?php   endif;
            endif;
        ?>
    </div>
    <div class="search">
        <?php get_search_form( 1 ); ?>
    </div>
    <div class="categories">
        <?php
            wp_dropdown_categories( array( 
                'show_count' => 0,
                'order' => 'name',
                'orderby' => 'ASC',
                'hierarchical' => 1,
                'selected' => 0,
                'class' => 'category-dropdown',
                'show_option_all' => 'Categories'
            ) );
        ?>
    </div>
</div>