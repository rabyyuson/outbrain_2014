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
<?php 
// If we passed in a category id, return the category link
if( $_GET['category_id'] ): ?>
    <input type="hidden" name="category-url" value="<?php echo ( get_category_link( $_GET['category_id'] ) ); ?>" />
<?php endif; ?>
<div class="container">
    <div class="subscription">
        <h2>Get Weekly Content Marketing Tips</h2>
        <p>Subscribe to get weekly tips and insights directly to your inbox</p>
        <?php gravity_form( 8, false, false, false, null, true, 1 ); ?>
        <?php
            // Check to see if we are on single page. If true, get the selected 
            // field options and store them in a javascript variable "post_options" 
            // used in single.js for checking.
            if( is_single() ):
                if( function_exists( 'get_field' ) ): ?>
                    <script>
                        var post_options = [
                        <?php foreach( get_field( 'blog_single_sidebar_subscription_form_field_selection', $post->ID ) as $class_name ):
                            echo "'" . $class_name . "',";
                        endforeach; ?>
                        ]
                    </script>
        <?php   endif;
            endif;
        ?>
        <script>
            // Get the blog permalink.
            var blog_url = '<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>';
        </script>
    </div>
    <div class="search">
        <?php get_search_form( 1 ); ?>
    </div>
    <div class="categories">
        <span class="button"></span>
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