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
    get_search_form( 1 );
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