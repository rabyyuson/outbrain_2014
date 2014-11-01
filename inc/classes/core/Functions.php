<?php

/**
 * Functions Class
 * 
 * The main functions class. Responsible for customizing the behavior of the 
 * website and also adding new features.
 * 
 * -----------------------------------------------------------------------------
 */

namespace Outbrain\Classes\Core;

class Functions {
    
    /**
     * Get the class' fully qualified namespace and name
     * @return string
     */
    public static function get_class_full_name(){
        
        return get_class();
        
    }
    
    /**
     * Setup the theme
     * @return null
     */
    public function after_setup_theme() {
                
        
        /********************************************
         * Theme Support
         ********************************************/
        
        add_theme_support( 'menus' );
        add_theme_support( 'post-thumbnails' );
        
            
        /********************************************
         * Images
         ********************************************/
            
        // Add Image Size
        // Enforce Hard Crop mode
        
        add_image_size( 'featured-thumbnail', 340, 250, TRUE );
        
        // Set Post Thumbnail Size
        
        set_post_thumbnail_size( 340, 250, TRUE );
            
            
        /********************************************
         * Actions
         ********************************************/
            
        // Add action.

        add_action( 'admin_head', array( Functions::get_class_full_name(), 'editor_style' ) );
        add_action( 'wp_enqueue_scripts', array( Functions::get_class_full_name(), 'wp_enqueue_scripts' ) );
        add_action( 'widgets_init', array( Functions::get_class_full_name(), 'widgets_init' ) );
        add_action( 'init', array( Functions::get_class_full_name(), 'tinymce_add_button' ) );
        add_action( 'admin_menu', function(){
            add_submenu_page( 'edit.php?post_type=webinars', 'Help', 'Help', 'edit_posts', 'webinar-help-page', function(){
                include( TEMPLATEPATH . '/inc/addons/webinar/help/how-to-create-an-outbrainy-webinar.php' );
            } );
        } );

        // Remove action.
        
        remove_action( 'wp_head', 'wp_generator' );
            
            
        /********************************************
         * Filters
         ********************************************/

        // Add filter.
        
        add_filter( 'default_content', array( Functions::get_class_full_name(), 'default_content' ), 10, 2 );
        add_filter( 'tiny_mce_before_init', array( Functions::get_class_full_name(), 'tinymce_kitchen_sink' ) );
        add_filter( 'the_content', array( Functions::get_class_full_name(), 'replace_public_links' ) );
        add_filter( 'gform_confirmation', function( $confirmation, $form, $lead, $ajax ){
            
            // First check if we are dealing with a 'downloads' post-type
            // If yes, redirect the page to a thank you page and pass the data ids.
            global $post, $wp_query;
            if( (string)$wp_query->query['post_type'] === 'downloads' ){
                $confirmation = array( 'redirect' => get_permalink( $post->ID ) . '?pid=' . $post->ID . '&paid=' . $post->post_author . '&lid=' . $lead['id'] . '&fid=' . $lead['form_id'] );
                return $confirmation;
            }
            
        }, 10, 4 );
        
        // Remove filter.
        
        remove_filter( 'template_redirect', 'redirect_canonical' );
            
            
        /********************************************
         * Post Types
         ********************************************/
            
        register_post_type( 'webinars', array(
            
            'description'       => 'Webinars',
            'capability_type'   => 'post',
            'public'            => TRUE,
            'show_ui'           => TRUE,
            'hierarchical'      => TRUE,
            'query_var'         => TRUE,
            'supports'          => array( 'title', 'editor' ),
            'rewrite'           => array( 
                'with_front'    => FALSE,
                'slug'          => 'webinars'
            ),
            'labels'                 => array(
                'name'               => 'Webinars',
		'singular_name'      => 'Webinar',
		'menu_name'          => 'Webinars',
		'name_admin_bar'     => 'Webinar',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Webinar',
		'new_item'           => 'New Webinar',
		'edit_item'          => 'Edit Webinar',
		'view_item'          => 'View Webinar',
		'all_items'          => 'All Webinars',
		'search_items'       => 'Search Webinars',
		'parent_item_colon'  => 'Parent Webinars:',
		'not_found'          => 'No webinars found.',
		'not_found_in_trash' => 'No webinars found in Trash.'
            ),
            
        ) );
        
        register_post_type( 'downloads', array(
            
            'description'       => 'Downloads',
            'capability_type'   => 'post',
            'public'            => TRUE,
            'show_ui'           => TRUE,
            'hierarchical'      => TRUE,
            'query_var'         => TRUE,
            'supports'          => array( 'title', 'editor' ),
            'rewrite'           => array( 
                'with_front'    => FALSE,
                'slug'          => 'downloads'
            ),
            'labels'            => array(
                'name'               => 'Downloads',
		'singular_name'      => 'Download',
		'menu_name'          => 'Downloads',
		'name_admin_bar'     => 'Download',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Download',
		'new_item'           => 'New Download',
		'edit_item'          => 'Edit Download',
		'view_item'          => 'View Download',
		'all_items'          => 'All Downloads',
		'search_items'       => 'Search Downloads',
		'parent_item_colon'  => 'Parent Downloads:',
		'not_found'          => 'No downloads found.',
		'not_found_in_trash' => 'No downloads found in Trash.'
            ),
            
        ));
        
        register_post_type( 'press', array(
            
            'label'             => __( 'Press' ),
            'singular_label'    => __( 'Press' ),
            'capability_type'   => 'post',
            'public'            => TRUE,
            'show_ui'           => TRUE,
            'hierarchical'      => TRUE,
            'query_var'         => TRUE,
            'supports'          => array( 'title', 'editor', 'author' ),
            'rewrite'           => array( 
                'with_front'    => FALSE,
                'slug'          => 'press'
            ),
            
        ));
        
        
        /********************************************
         * Taxonomies
         ********************************************/
            
        register_taxonomy( 'download-file', 'downloads', array( 
            
            'hierarchical'  => TRUE, 
            'query_var'     => TRUE, 
            'rewrite'       => TRUE,
            'labels'        => array(
                'name'                => 'Category',
                'singular_name'       => 'Category',
                'menu_name'           => 'Categories',
                'parent_item_colon'   => 'Parent Category',
                'all_items'           => 'All Categories',
                'view_item'           => 'View Category',
                'add_new_item'        => 'Add New Category',
                'add_new'             => 'Add New',
                'edit_item'           => 'Edit Category',
                'update_item'         => 'Update Category',
                'search_items'        => 'Search Category',
                'not_found'           => 'Not Found',
                'not_found_in_trash'  => 'Not found in Trash',
            ),
            
        ) ); 
        
        register_taxonomy( 'webinar-account', 'webinars', array( 
            
            'hierarchical'  => TRUE, 
            'query_var'     => TRUE, 
            'rewrite'       => FALSE,
            'labels'        => array(
                'name'                => 'GoToWebinar Account',
                'singular_name'       => 'GoToWebinar Account',
                'menu_name'           => 'Setup Accounts',
                'parent_item_colon'   => 'Parent Account',
                'all_items'           => 'All Accounts',
                'view_item'           => 'View Account',
                'add_new_item'        => 'Add New Account',
                'add_new'             => 'Add New',
                'edit_item'           => 'Edit Account',
                'update_item'         => 'Update Account',
                'search_items'        => 'Search Account',
                'not_found'           => 'Not Found',
                'not_found_in_trash'  => 'Not found in Trash',
            ),
            
        ) ); 
        
        // Check if the ACF plugin is activated and the function is available
        // Add the options page on the "More Options" are under Posts
        
        if( function_exists( 'acf_add_options_sub_page' ) )
        {
            acf_add_options_sub_page( array(
                'title'         => 'More Options',
                'parent'        => 'edit.php',
                'capability'    => 'manage_options'
            ));
        }
                
        // Check if we are on Staging or Production
        // If in Staging, use the Sandbox Salesforce SOAP location
        // If in Production, use the Production Salesforce SOAP location
        
        if( strpos( $_SERVER['HTTP_HOST'], 'site-19002' ) >= 0 || strpos( $_SERVER['HTTP_HOST'], 'site-19001' ) >= 0 ) {
            add_filter( 'gf_salesforce_soap_options', create_function( '', 'return array( "location" => "https://test.salesforce.com/services/Soap/u/27.0" );' ) );
            add_action( 'gf_salesforce_connection', function( $client ){
                
                // Two Options for Setting Assignment Rule
                // 1. Pass in AssignmentRule ID and "false" to use a specific assignment rule.
                // 2. Pass in null and true to trigger the DEFAULT AssignementRule
                
                $header = new \AssignmentRuleHeader( null, true );

                $client->setAssignmentRuleHeader( $header );

                return $client;
            });

        }
        
    }
    
    /**
     * Enqueue the scripts
     * @return null
     */
    public function wp_enqueue_scripts() {
        
        /********************************************
         * Front or Homepage
         ********************************************/
        
        if( is_front_page() ) {
            
            wp_enqueue_style( 'frontpage', Functions::replace_public_links( get_template_directory_uri() ) . '/css/front/frontpage.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'frontpage-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/front/frontpage.js', array(), null, TRUE );
        
            
        /********************************************
         * Blog -- Post Index
         ********************************************/
        
        } elseif( is_home() ) {
            
            wp_enqueue_script( 'blog-outbrain', '//widgets.outbrain.com/outbrain.js', array(), null, FALSE );
            wp_enqueue_style( 'blog-header', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/header.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-post-index', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/post/index.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-post-index-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/post/index.js', array(), null, TRUE );
            wp_enqueue_script( 'blog-post-featured-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/post/featured.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-sidebar', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/sidebar.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-sidebar-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/global/sidebar.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-footer', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/footer.css', array(), FALSE, 'all' );
                    
            
        /********************************************
         * Blog -- Post Single
         ********************************************/
        
        } elseif( is_single() ) {
            
            wp_enqueue_script( 'blog-outbrain', '//widgets.outbrain.com/outbrain.js', array(), null, FALSE );
            wp_enqueue_style( 'blog-header', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/header.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-post-single', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/post/single.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-post-single-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/post/single.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-sidebar', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/sidebar.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-sidebar-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/global/sidebar.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-footer', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/footer.css', array(), FALSE, 'all' );
            ( ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) ? wp_enqueue_script( 'comment-reply' ) : false );
            
            
        /********************************************
         * Blog -- Category Index
         ********************************************/
        
        } elseif( is_page_template( 'page-templates/categories.php' ) ) {
            
            wp_enqueue_style( 'blog-header', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/header.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-home', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/home/home.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-home-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/home/home.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-sidebar', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/sidebar.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-sidebar-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/global/sidebar.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-categories', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/category/category.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-footer', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/footer.css', array(), FALSE, 'all' );
                        
            
        /********************************************
         * Blog -- Category Single
         ********************************************/
        
        } elseif( is_category() ) {
            
            wp_enqueue_script( 'blog-outbrain', '//widgets.outbrain.com/outbrain.js', array(), null, FALSE );
            wp_enqueue_style( 'blog-header', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/header.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-post-index', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/post/index.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-post-index-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/post/index.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-sidebar', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/sidebar.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-sidebar-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/global/sidebar.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-category-single', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/category/single.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-footer', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/footer.css', array(), FALSE, 'all' );
                        
              
        /********************************************
         * Blog -- Author Index
         ********************************************/
        
        } elseif( is_page_template( 'page-templates/authors.php' ) ) {
            
            wp_enqueue_style( 'blog-header', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/header.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-sidebar', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/sidebar.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-sidebar-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/global/sidebar.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-author-index', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/author/index.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-author-index-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/author/index.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-footer', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/footer.css', array(), FALSE, 'all' );
            
            
        /********************************************
         * Blog -- Author Single
         ********************************************/
        
        } elseif( is_author() ) {
            
            wp_enqueue_style( 'blog-header', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/header.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-sidebar', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/sidebar.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-sidebar-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/global/sidebar.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-post-index', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/post/index.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-author-index', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/author/index.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-author-single', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/author/single.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-footer', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/footer.css', array(), FALSE, 'all' );
            
            
        /********************************************
         * Blog -- Archives Index
         ********************************************/
        
        } elseif( is_page_template( 'page-templates/archives.php' ) ) {
            
            wp_enqueue_style( 'blog-header', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/header.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-sidebar', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/sidebar.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-sidebar-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/global/sidebar.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-archives-index', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/archives/index.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-archive-index-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/archives/index.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-post-index', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/post/index.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-post-index-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/post/index.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-footer', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/footer.css', array(), FALSE, 'all' );
            
            
        /********************************************
         * Blog -- Archive Single
         ********************************************/
        
        } elseif( is_archive() ) {
            
            wp_enqueue_style( 'blog-header', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/header.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-sidebar', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/sidebar.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-sidebar-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/global/sidebar.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-archives-index', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/archives/index.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-archive-index-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/archives/index.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-post-index', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/post/index.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-post-index-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/post/index.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-footer', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/footer.css', array(), FALSE, 'all' );
            
            
        /********************************************
         * Page
         ********************************************/
        
        } elseif( is_page() && ! is_page_template() ) {
            
            wp_enqueue_style( 'page', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page/page.css', array(), FALSE, 'all' );

            
        /********************************************
         * Amplify
         ********************************************/
            
        } elseif ( is_page_template( 'page-templates/amplify.php' ) ) {
            
            wp_enqueue_style( 'amplify', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/amplify/amplify.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'amplify-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/amplify/amplify.js', array(), null, TRUE );

            
        /********************************************
         * Amplify -- Guidelines
         ********************************************/
        
        } elseif( is_page_template( 'page-templates/guidelines.php' ) ) {
            
            wp_enqueue_style( 'guidelines', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/amplify/guidelines.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'guidelines-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/amplify/guidelines.js', array(), null, TRUE );
            
            
        /********************************************
         * Engage
         ********************************************/
            
        } elseif ( is_page_template( 'page-templates/engage.php' ) ) {
            
            wp_enqueue_style( 'engage', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/engage/engage.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'bootstrap', Functions::replace_public_links( get_template_directory_uri() ) . '/inc/libraries/bootstrap/css/bootstrap.min.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'engage-waypoint-js', '//wp.outbrain.com/wp-content/themes/outbrain/static/engage-files/vr/js/waypoints.vr.js', array(), null, TRUE );
            wp_enqueue_script( 'jquery-easing-js', '//wp.outbrain.com/wp-content/themes/outbrain/static/engage-files/vr/js/jquery.easing.min.js', array(), null, TRUE );
            wp_enqueue_script( 'jquery-typer-js', '//wp.outbrain.com/wp-content/themes/outbrain/static/engage-files/vr/js/jquery.typer.js', array(), null, TRUE );
            wp_enqueue_script( 'engage-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/engage/engage.js', array(), null, TRUE );
            wp_enqueue_script( 'bootstrap-js', Functions::replace_public_links( get_template_directory_uri() ) . '/inc/libraries/bootstrap/js/bootstrap.min.js', array(), null, TRUE );
            wp_enqueue_style( 'vr', '//wp.outbrain.com/wp-content/themes/outbrain/static/engage-files/vr/style.css', array(), FALSE, 'all' );
        
            
        /********************************************
         * About -- Company
         ********************************************/
            
        } elseif ( is_page_template( 'page-templates/company.php' ) ) {

            wp_enqueue_style( 'navigation', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'company', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/company.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/navigation.js', array(), null, TRUE );
                
            
        /********************************************
         * About -- Team
         ********************************************/
            
        } elseif ( is_page_template( 'page-templates/team.php' ) ) {

            wp_enqueue_style( 'navigation', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'team', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/team.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/navigation.js', array(), null, TRUE );
            wp_enqueue_script( 'team-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/team.js', array(), null, TRUE );
               
                
        /********************************************
         * About -- Offices
         ********************************************/
                
        } elseif ( is_page_template( 'page-templates/offices.php' ) ) {

            wp_enqueue_style( 'navigation', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'offices', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/offices.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/navigation.js', array(), null, TRUE );
            wp_enqueue_script( 'offices-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/offices.js', array(), null, TRUE );
              
                
        /********************************************
         * About -- Press
         ********************************************/
                
        } elseif ( is_page_template( 'page-templates/press.php' ) ) {

            wp_enqueue_style( 'navigation', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'press', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/press.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/navigation.js', array(), null, TRUE );
            wp_enqueue_script( 'press-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/press.js', array(), null, TRUE );
        
            
        /********************************************
         * Contact
         ********************************************/
        
        } elseif( is_page_template( 'page-templates/contact.php' ) ) {
            
            wp_enqueue_style( 'contact', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/contact/contact.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'contact-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/contact/contact.js', array(), null, TRUE );     
            wp_enqueue_script( 'gravityforms-js', Functions::replace_public_links( get_home_url() ) . '/wp-content/plugins/gravityforms/js/gravityforms.js?ver=1.7.12', array(), null, TRUE );     
            wp_enqueue_script( 'conditional-logic-js', Functions::replace_public_links( get_home_url() ) . '/wp-content/plugins/gravityforms/js/conditional_logic.js?ver=1.7.12', array(), null, TRUE );     
            
            
        /********************************************
         * Legal -- Privacy Policy
         ********************************************/
        
        } elseif ( is_page_template( 'page-templates/privacy-policy.php' ) ) {

            wp_enqueue_style( 'navigation', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/legal/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/legal/navigation.js', array(), null, TRUE );
            wp_enqueue_style( 'privacy-policy', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/legal/privacy-policy.css', array(), FALSE, 'all' );
            
        
        /********************************************
         * Legal -- Terms of Use
         ********************************************/
        
        } elseif ( is_page_template( 'page-templates/terms-of-use.php' ) ) {

            wp_enqueue_style( 'navigation', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/legal/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/legal/navigation.js', array(), null, TRUE );
            wp_enqueue_style( 'terms-of-use', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/legal/terms-of-use.css', array(), FALSE, 'all' );
            
        
        /********************************************
         * Legal -- Customer Terms
         ********************************************/
        
        } elseif ( is_page_template( 'page-templates/customer-terms.php' ) ) {

            wp_enqueue_style( 'navigation', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/legal/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/legal/navigation.js', array(), null, TRUE );
            wp_enqueue_style( 'customer-terms', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/legal/customer-terms.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'customer-terms-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/legal/customer-terms.js', array(), null, TRUE );
         
            
        }
        
        
        /********************************************
         * Global/ALL Pages
         ********************************************/
                
        if( ! strpos( $_SERVER['REQUEST_URI'], 'wp-admin' ) ) {
            
            $environment = Functions::get_kissmetrics_keys();
            
            /********************************************
             * De-Register Scripts
             ********************************************/

            wp_deregister_script( 'jquery' );


            /********************************************
             * Enqueue Styles
             ********************************************/
            
            // Global styles.
            wp_enqueue_style( 'outbrain', Functions::replace_public_links( get_stylesheet_uri() ), array(), FALSE, 'all' );

            
            /********************************************
             * Enqueue Scripts
             ********************************************/

            // Header scripts.
            wp_enqueue_script( 'typekit-js', '//use.typekit.net/xsa6cds.js', array(), null, FALSE );
            wp_enqueue_script( 'jquery-new', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), null, FALSE );
            wp_enqueue_script( 'header-scripts-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/core/header-scripts.js', array(), null, FALSE );
            wp_enqueue_script( 'header-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/core/header.js', array(), null, TRUE );

            // u.outbrain (Referrer Attribution) scripts.
            wp_enqueue_script( 'underscore-min-js', '//' . $environment['script_source'] . '.outbrain.com/js/lib/underscore/underscore-min.js?v=11', array(), null, FALSE );
            wp_enqueue_script( 'cookie-js', '//' . $environment['script_source'] . '.outbrain.com/js/lib/cookie.js/cookie.js?v=11', array(), null, FALSE );
            wp_enqueue_script( 'uri-js', '//' . $environment['script_source'] . '.outbrain.com/js/lib/jsUri/Uri.js?v=11', array(), null, FALSE );
            wp_enqueue_script( 'referrers-attribution-js', '//' . $environment['script_source'] . '.outbrain.com/js/customerAttribution/referrersAttribution.js?v=11', array(), null, FALSE );
            wp_enqueue_script( 'customer-attribution-js', '//' . $environment['script_source'] . '.outbrain.com/js/customerAttribution/customerAttribution.js?v=11', array(), null, FALSE );

            // Footer scripts.
            wp_enqueue_script( 'twitter-js', '//platform.twitter.com/oct.js', array(), null, TRUE );
            wp_enqueue_script( 'footer-scripts-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/core/footer-scripts.js', array(), null, TRUE );
            
        }   
        
    }
    
    /**
     * Check if we are on blog
     * @global object $post
     * @return boolean
     */
    public function is_blog () {
        
        global $post;
        $posttype = get_post_type( $post );
        return ( ( ( is_archive() ) || ( is_author() ) || ( is_category() ) || ( is_home() ) || ( is_single() ) || ( is_tag() ) ) && ( $posttype == 'post' ) ) ? true : false;
        
    }
    
    /**
     * Register the widget to be used for the sidebar
     * @return null
     */
    public function widgets_init() {
        
        register_sidebar( array(
            
            'name' => 'Pages',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            
        ));
        
    }
    
    /**
     * Replace public links
     * @return string
     */
    public function replace_public_links( $original ) {
        
        $content = str_replace( array(
            
            'site-20000-prod-ladc1.ladc1',
            'site-20001-prod-ladc1.ladc1'
            
        ), 'www', $original );
        
        return $content;
        
    }
    
    /**
     * Expose the public link functionality
     * @param string $content
     * @return string
     */
    public static function get_replaced_public_links( $content ) {
        
       return Functions::replace_public_links( $content );
       
    }
    
    /**
     * Kissmetrics Keys
     * @return array
     */
    public static function get_kissmetrics_keys() {
       
       // Define the environments.
       $km_stg = array( 'kissmetrics_key' => 'f66835a8bec819de96f432eadc55fc02fd810a57', 'script_source' => 'u2' );
       $km_prod = array( 'kissmetrics_key' => '789c08a013da3c28146d21b31603af344e16f6ef', 'script_source' => 'u' );
       
       // Define the mapping.
       $environments = array(

           // Staging.
           'w2.' => $km_stg,
           'site-19002' => $km_stg,
           'site-19001' => $km_stg,

           // Production.
           'w.' => $km_prod,
           'site-20000' => $km_prod,
           'site-20001' => $km_prod,
           
       );
       
       // Define the environment items array.
       $env_items = array();
       
       // Loop through the environments.
       foreach($environments as $k=>$v):
           
           // Check the name of the server.
           if( stripos( get_bloginfo('siteurl'), $k ) ):
               // Assign the items retrieved to the environment items array.
               $env_items['kissmetrics_key'] = $v['kissmetrics_key'];
               $env_items['script_source'] = $v['script_source'];
           endif;
           
       endforeach;
       
       // Return the content
       return $env_items;
       
   }
   
   /**
     * Get the pagination links for posts
     * @return string
     */
    public static function get_pagination() {
        
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) { return; }

	$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args = array();
	$url_parts = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) { wp_parse_str( $url_parts[1], $query_args ); }

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
            'base'     => $pagenum_link,
            'format'   => $format,
            'total'    => $GLOBALS['wp_query']->max_num_pages,
            'current'  => $paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $query_args ),
            'prev_text' => __( '&lsaquo; Previous Page', 'yarongalai' ),
            'next_text' => __( 'Next Page &rsaquo;', 'yarongalai' ),
	) );

        $html = '';
        
	if ( $links ) : ?>

            <nav class="pagination" role="navigation">
                <?php echo $links; ?>
            </nav>
            <div class="loading">Loading...</div>
            
        <?php endif;
        return $html;
        
    }
    
    /**
     * The default editor content
     * @param string $content
     * @param object $post
     * @return string
     */
    public function default_content( $content, $post ) {
        
        if( (string)$post->post_type === 'webinars' ) : 
            
            $content = '
                <div class="webinar-inner">
                    <div class="left">
                        <div class="right">
                            <ul>
                                <li class="image">[ 155 x 155 IMG ]</li>
                                <li class="name">[ Speaker Name ]</li>
                                <li class="title">[ Title/Position ]</li>
                            </ul>
                        </div>
                        <p>Enter the webinar\'s description information here...</p>
                        <p>You can add some list here as well:</p>
                        <ul>
                            <li>Here\'s a sample item</li>
                            <li>And here\'s another sample item</li>
                            <li>And here\'s the last sample item</li>
                        </ul>
                        <p>Some more paragraph here...</p>
                    </div>
                </div>
            ';
        
        elseif( (string)$post->post_type === 'downloads' ): 
        
            $content = '
                <div class="download-inner">
                    <div class="left">
                        <h1 class="heading-title">Get Weekly<br/>Content Marketing Tips</h1>
                        <h3 class="heading-subtitle">Subscribe to get weekly tips and insights directly to your inbox</h3>
                        <p class="heading-paragraph">Getting started and then scaling content marketing is tough. We’ve been helping marketers succeed with content marketing for over 8 years, and now we’re sharing what we’ve learned.</p>
                        <div class="mid-section">
                            <div class="left">
                                <div class="image">[ 345 x 450 image ]</div>
                            </div>
                            <div class="right">
                                <ul class="mid-list">
                                    <li>Lorem ipsum dolor sit ametconsectetur adipiscing elit</li>
                                    <li>In id auctor libero. In quis libero sed nibh rutrum vulputate quis non odio</li>
                                    <li>Sed tincidunt pulvinar magna non</li>
                                    <li>Nullam tincidunt fermentum leo non ornare</li>
                                    <li>Lorem ipsum dolor sit ametconsectetur adipiscing elit</li>
                                </ul>
                                <p class="mid-paragraph">We’re excited to help you make content marketing succeed for your business. Subscribe today!</p>
                            </div>
                        </div>
                    </div>
                    <div class="right form">
                        <div class="">Form</div>
                    </div>
                </div>
            ';
            
        endif;

        return $content;
        
    }
    
    /**
     * Add the stylesheet for the post type
     * @global string $current_screen
     */
    public function editor_style() {
        
        global $current_screen;
        
        switch ( $current_screen->post_type ) {
            
            case 'webinars':
                add_editor_style( 'inc/addons/webinar/css/editor_style.css' );
                break;
            
            case 'downloads':
                add_editor_style( 'inc/addons/downloads/css/editor_style.css' );
                break;
            
            case 'post':
                add_editor_style( 'css/core/blog-post-editor.css' );
                break;
            
            default:
                break;
            
        }
        
    }
    
    /**
     * Add additional buttons to the tinymce post editor
     * @return array
     */
    public function tinymce_add_button() {
        
        if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) && get_user_option( 'rich_editing' ) ) {
            add_filter( 'mce_external_plugins', ( function( $plugin_array ) {
                $plugin_array['indented_text_with_rule'] = Functions::replace_public_links( get_template_directory_uri() ) . '/js/core/blog-post-editor.js';
                $plugin_array['tip_box'] = Functions::replace_public_links( get_template_directory_uri() ) . '/js/core/blog-post-editor.js';
                return $plugin_array; 
            } ) );
            add_filter( 'mce_buttons', function( $buttons ) {
                array_push( $buttons, 'indented_text_with_rule', 'tip_box' );
                return $buttons;
            } );
        }
        
    }
    
    /**
     * Always show the blog post editor kitchen sink toolbar
     * @param array $in
     * @return boolean
     */
    public function tinymce_kitchen_sink( $in ) {
        
        $in['wordpress_adv_hidden'] = FALSE;
        return $in;
        
    }
    
    /**
     * Get a list of authors by their group function
     * @param array $users
     * @param array $user_meta
     * @return null
     */
    public static function get_authors_by_group( $users ) { ?>
            
        <ul>
            <?php foreach( $users as $user ): ?>
                <?php
                    // Get all user meta information.
                    // Take only the first index of the returned array result.
                    $user_meta = array_map( function( $array ){ 
                        return $array[0]; 
                    }, get_user_meta( $user->ID ) );
                ?>
                <li class="user">
                    <div class="image">
                        <a href="<?php echo get_author_posts_url( $user->ID ); ?>">
                            <?php echo get_avatar( $user->ID, 175 ); ?>
                        </a>
                    </div>
                    <div class="information">
                        <div class="name">
                            <a href="<?php echo get_author_posts_url( $user->ID ); ?>">
                                <?php echo $user->display_name; ?> <span class="medium"><?php echo $user_meta['user_title']; ?></span> 
                            </a>
                        </div>
                        <p>
                            <?php 
                                // Limit the number of characters for the biography information.
                                // Show an ellipsis and a Read More link at the end.
                                $description = explode( ' ', ( $user_meta['description'] ? $user_meta['description'] : 'No information' ) );
                                $description_html = substr( implode( ' ', $description ), 0, ( !is_author() ? 260 : 99999 ) ) . ( !is_author() ? '...' : false );
                                $description_html .= ( !is_author() ? '<a href="'. get_author_posts_url( $user->ID ) . '">Read More &rsaquo;</a>' : false );
                                echo $description_html;
                            ?>
                        </p>
                        <ul class="social">
                            <?php 
                                // Get the social network links associated with this user.
                                $social_networks = array(
                                    array( 'id' => 'facebook', 'image' => get_template_directory_uri() . '/images/blog/global/social-facebook.png' ),
                                    array( 'id' => 'twitter', 'image' => get_template_directory_uri() . '/images/blog/global/social-twitter.png' ),
                                    array( 'id' => 'google_plus', 'image' => get_template_directory_uri() . '/images/blog/global/social-googleplus.png' ),
                                    array( 'id' => 'linkedin', 'image' => get_template_directory_uri() . '/images/blog/global/social-linkedin.png' ),
                                );
                                foreach( $social_networks as $k => $v ):
                                    if( $user_meta[ $v['id'] ] ): ?>
                                        <li>
                                            <a href="<?php echo $user_meta[ $v['id'] ] ?>" target="_blank">
                                                <img src="<?php echo $v['image'] ?>" />
                                            </a>
                                        </li>
                            <?php   endif;
                                endforeach;
                            ?>
                        </ul>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
            
    <?php
    }
    
    /**
     * Get the archives list
     * @global object $wpdb
     */
    public static function get_archives() {
        
        global $wpdb; global $wp_query; $year = null;
        
        // Pull all the months and years of posts form the database
        // We'll use these results later when building the navigation
        $dates = $wpdb->get_results("
            SELECT DISTINCT 
                MONTH( post_date ) AS month,
                YEAR( post_date ) AS year
            FROM $wpdb->posts
            WHERE post_status = 'publish'
            AND post_date <= '" . date( 'Y-m-d H:i:s' ) . "'
            AND post_type = 'post'
            GROUP BY month, year
            ORDER BY post_date 
            DESC
        ");
        
        // Iterate through the retrieved dates and display them.
        // Show the Year first and then all of the Months.
        foreach( $dates as $date ) :
            
            // Initialize the comparison variable to be used for checking
            // which archive month to display in the navigation menu
            $compare = array(
                'selected_year' => (int)$wp_query->query['year'],
                'selected_month' => (int)$wp_query->query['monthnum'],
                'this_object_year' => (int)$date->year,
                'this_object_month' => (int)$date->month,
                'today' => getdate()
            );
        
            // Build the navigation menu logic checker
            $show_selected = function( $compare ){
                if ( 
                    $compare['selected_year'] === $compare['this_object_year'] ||
                    ( !$compare['selected_year'] ) && $compare['this_object_year'] === $compare['today']['year'] 
                ){ return 'show'; }
            };
            
            // Build the selected month logic checker
            $highlight_month = function( $compare ){
                if( 
                    $compare['selected_month'] === $compare['this_object_month'] && $compare['selected_year'] === $compare['this_object_year'] ||
                    ( !$compare['selected_month'] ) && $compare['this_object_month'] === $compare['today']['mon'] && $compare['this_object_year'] === $compare['today']['year']
                ){ return 'class="active"'; }
            };
            
            // Show the year headline and wrap the yearly post.
            // Adjust the $year variable and find out if we are moving to a new year value
            if( $year != $date->year ) {
                
                $html = '</ul>';
                $html .= '<h4 class="year-' . $date->year . '">' . $date->year . '</h4>';
                $html .= '<ul class="year-'. $date->year . ' ' . $show_selected( $compare ) . '">';
                echo $html;
                
                // Store the last pulled year from the object
                $year = $date->year;
            }
            
        ?>
            
            <li>
                <a href="<?php echo get_month_link( $date->year, $date->month ); ?>" <?php echo $highlight_month( $compare ); ?>>
                    <?php echo date( "F", mktime( 0, 0, 0, $date->month, 1, $date->year ) ); ?>
                </a>
            </li>
            
    <?php 
        
        endforeach;
        
    }
    
    /**
     * 
     * @param string $network
     * @param string $url
     * @param string $title
     * @param string $description
     * @param string $via
     * @return string
     */
    public static function share_this_page( $network, $url, $title, $description, $via ) {
        
        // Define options
        $options = array(
            'facebook' => array(
                'app_id'    =>  '665869746843573'
            )
        );
        
        // Build the url sharer with the passed parameter values.
        $sharer = array(
            "facebook"      =>  "https://www.facebook.com/dialog/share?app_id=" . $options['facebook']['app_id'] . "&display=popup&href=$url&redirect_uri=$url",
            "twitter"       =>  "https://twitter.com/share?url=$url&text=$title&via=$via",
            "google_plus"   =>  "https://plus.google.com/share?url=$url",
            "linkedin"      =>  "http://www.linkedin.com/shareArticle?url=$url&title=$title"
        );
        
        return $sharer[$network];
    }
    
    /**
     * Get the first image from the post
     * @global object $post
     * @return string
     */
    public static function get_first_post_image() {
        
        global $post;
        $default_img = '';
        ob_start(); ob_end_clean();
        
        // Look for image match and pass the returned result to the $default_img variable.
        $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
        $default_img = $matches[1][0];
        
        $default_img = ( empty( $default_img ) ? "http://wp.outbrain.com/wp-content/themes/outbrain/images/logo.png" : $default_img );
        
        return $default_img;
    }
    
    /**
     * Get the featured header promotion box
     * @param string $section
     */
    public static function get_header_featured_promotion( $section ) {
        
        if( function_exists( 'get_field' ) ) {
            
            // Let's first build the field name mapping.
            $field = array(
                
                'global' => array(
                    'image'         => 'blog_global_header_promotion_image',
                    'title'         => 'blog_global_header_promotion_title',
                    'description'   => 'blog_global_header_promotion_description',
                    'button_text'   => 'blog_global_header_promotion_button_text',
                    'button_url'    => 'blog_global_header_promotion_button_link_url',
                ),
                
                'post_index' => array(
                    'image'         => 'blog_post_index_header_promotion_image',
                    'title'         => 'blog_post_index_header_promotion_title',
                    'description'   => 'blog_post_index_header_promotion_description',
                    'button_text'   => 'blog_post_index_header_promotion_button_text',
                    'button_url'    => 'blog_post_index_header_promotion_button_link_url',
                ),
                
                'post_single' => array(
                    'image'         => 'blog_post_single_header_promotion_image',
                    'title'         => 'blog_post_single_header_promotion_title',
                    'description'   => 'blog_post_single_header_promotion_description',
                    'button_text'   => 'blog_post_single_header_promotion_button_text',
                    'button_url'    => 'blog_post_single_header_promotion_button_link_url',
                ),
                
                'category_index' => array(
                    'image'         => 'blog_category_index_header_promotion_image',
                    'title'         => 'blog_category_index_header_promotion_title',
                    'description'   => 'blog_category_index_header_promotion_description',
                    'button_text'   => 'blog_category_index_header_promotion_button_text',
                    'button_url'    => 'blog_category_index_header_promotion_link_url',
                ),
                
                'category_single' => array(
                    'image'         => 'blog_category_single_header_promotion_image',
                    'title'         => 'blog_category_single_header_promotion_title',
                    'description'   => 'blog_category_single_header_promotion_description',
                    'button_text'   => 'blog_category_single_header_promotion_button_text',
                    'button_url'    => 'blog_category_single_header_promotion_button_link_url',
                ),
                
                'author_index' => array(
                    'image'         => 'blog_author_index_header_promotion_image',
                    'title'         => 'blog_author_index_header_promotion_title',
                    'description'   => 'blog_author_index_header_promotion_description',
                    'button_text'   => 'blog_author_index_header_promotion_button_text',
                    'button_url'    => 'blog_author_index_header_promotion_button_link_url',
                ),
                
                'author_single' => array(
                    'image'         => 'blog_author_single_header_promotion_image',
                    'title'         => 'blog_author_single_header_promotion_title',
                    'description'   => 'blog_author_single_header_promotion_description',
                    'button_text'   => 'blog_author_single_header_promotion_button_text',
                    'button_url'    => 'blog_author_single_header_promotion_button_link_url',
                ),
                
                'archive_index' => array(
                    'image'         => 'blog_archive_index_header_promotion_image',
                    'title'         => 'blog_archive_index_header_promotion_title',
                    'description'   => 'blog_archive_index_header_promotion_description',
                    'button_text'   => 'blog_archive_index_header_promotion_button_text',
                    'button_url'    => 'blog_archive_index_header_promotion_button_link_url',
                ),
                
                'archive_single' => array(
                    'image'         => 'blog_archive_single_header_promotion_image',
                    'title'         => 'blog_archive_single_header_promotion_title',
                    'description'   => 'blog_archive_single_header_promotion_description',
                    'button_text'   => 'blog_archive_single_header_promotion_button_text',
                    'button_url'    => 'blog_archive_single_header_promotion_button_link_url',
                ),
                
            ); 
            
            // Check to see if we have global featured promotion
            if( 
                get_field( $field['global']['image'], 'option' ) &&
                get_field( $field['global']['title'], 'option' ) &&
                get_field( $field['global']['description'], 'option' ) &&
                get_field( $field['global']['button_text'], 'option' ) &&
                get_field( $field['global']['button_url'], 'option' ) 
            ){
                $display = array(
                    'image'         => $field['global']['image'],
                    'title'         => $field['global']['title'],
                    'description'   => $field['global']['description'],
                    'button_text'   => $field['global']['button_text'],
                    'button_url'    => $field['global']['button_url'],
                );
            } else {
                $display = array(
                    'image'         => $field[$section]['image'],
                    'title'         => $field[$section]['title'],
                    'description'   => $field[$section]['description'],
                    'button_text'   => $field[$section]['button_text'],
                    'button_url'    => $field[$section]['button_url'],
                );
            }
            
            // Check if we have data to display...
            if(
                get_field( $display['image'], 'option' ) &&
                get_field( $display['title'], 'option' ) &&
                get_field( $display['description'], 'option' ) &&
                get_field( $display['button_text'], 'option' ) &&
                get_field( $display['button_url'], 'option' ) 
            ): ?>
            
            <div class="header-promotion">
                <div class="image">
                    <img src="<?php echo get_field( $display['image'], 'option' ); ?>" />
                </div>
                <div class="information">
                    <h3 class="title"><?php echo get_field( $display['title'], 'option' ); ?></h3>
                    <p class="description"><?php echo get_field(  $display['description'], 'option' ); ?></p>
                    <form method="POST" action="<?php echo get_field( $display['button_url'], 'option' ); ?>">
                        <input type="submit" class="button" value="<?php echo get_field( $display['button_text'], 'option' ); ?>" />
                        <input type="hidden" name="origin_url" value="<?php echo esc_url( get_permalink() ); ?>" />
                    </form>
                </div>
            </div>
            
        <?php
            endif;
        }
        
    }
    
}

// call the after theme setup method
add_action( 'after_setup_theme', array( Functions::get_class_full_name(), 'after_setup_theme' ) );