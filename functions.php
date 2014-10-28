<?php

/**
 * Functions Logic
 *
 * The business logic for the site. This file is invoking multiple classes 
 * located in the "inc/classes" folder.
 *
 * -----------------------------------------------------------------------------
 */

if ( ! function_exists( 'main' ) ) {
    
    /**
     * Initialize and invoke class files
     * @return null
     */
    function main() {
    
        /* Require Classes */
        require_once ( get_template_directory() . '/inc/classes/core/Functions.php' );
        require_once ( get_template_directory() . '/inc/addons/webinar/classes/Categories.php' );
        require_once ( get_template_directory() . '/inc/addons/webinar/classes/Posts.php' );
        
    }

}

main(); // Run main function