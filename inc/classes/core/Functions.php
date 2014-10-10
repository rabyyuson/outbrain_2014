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

        add_action( 'admin_head', array( Functions::get_class_full_name(), 'webinar_editor_style' ) );
        add_action( 'admin_menu', array( Functions::get_class_full_name(), 'register_webinar_help_page' ) );
        add_action( 'wp_enqueue_scripts', array( Functions::get_class_full_name(), 'wp_enqueue_scripts' ) );
        add_action( 'widgets_init', array( Functions::get_class_full_name(), 'widgets_init' ) );
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
        
        add_filter( 'default_content', 'webinar_default_content', 10, 2 );
        add_filter( 'the_content', array( Functions::get_class_full_name(), 'replace_public_links' ) );
        
        // Remove filter.
        
        remove_filter('template_redirect', 'redirect_canonical');
            
            
        /********************************************
         * Taxonomies
         ********************************************/
            
        register_taxonomy( 'classification', 'casestudies', array( 
            
            'hierarchical'      =>  TRUE, 
            'label'             => 'Classification', 
            'query_var'         => TRUE, 
            'rewrite'           => FALSE,
            'edit_item'         => 'Edit Classification', 
            'update_item'       => 'Update Classification', 
            'add_new_item'      => 'Add New Classification', 
            'new_item_name'     => 'New Classification Name',
            
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
            
            
        /********************************************
         * Post Types
         ********************************************/
            
        register_post_type( 'webinars', array(
            
            'description'       => 'Webinars',
            'public'            => TRUE,
            'show_ui'           => TRUE,
            'capability_type'   => 'post',
            'hierarchical'      => TRUE,
            'rewrite'           => FALSE,
            'query_var'         => TRUE,
            'supports'          => array(
                'title', 'editor'
            ),
            'labels'            => array(
                'name'              => 'Webinars',
                'add_new'           => 'Add New',
                'add_new_item'      => 'Add New Webinar',
            ),
            
        ) );
        
        register_post_type( 'casestudies', array(
            
            'label'             => __( 'Case Studies' ),
            'singular_label'    => __( 'Case Study' ),
            'public'            => TRUE,
            'show_ui'           => TRUE,
            'capability_type'   => 'post',
            'hierarchical'      => TRUE,
            'rewrite'           => FALSE,
            'query_var'         => TRUE,
            'supports'          => array(
                'title', 'editor', 'author'
            ),
            
        ));
        
        register_post_type( 'press', array(
            
            'label'             => __( 'Press' ),
            'singular_label'    => __( 'Press' ),
            'public'            => TRUE,
            'show_ui'           => TRUE,
            'capability_type'   => 'post',
            'hierarchical'      => TRUE,
            'query_var'         => TRUE,
            'rewrite'           => array(
                'slug' => '_press'
            ),
            'supports'          => array(
                'title', 'editor', 'author'
            ),
            
        ));
        
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
            
            wp_enqueue_style( 'frontpage-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/front/frontpage.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'frontpage-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/front/frontpage.js', array(), null, TRUE );
        
            
        /********************************************
         * Home or Blog Posts Index
         ********************************************/
        
        } elseif( is_home() ) {
            
            wp_enqueue_style( 'blog-header-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/header.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'blog-home-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/home/home.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-home-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/home/home.js', array(), null, TRUE );
            wp_enqueue_style( 'blog-sidebar-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/blog/global/sidebar.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'blog-sidebar-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/blog/global/sidebar.js', array(), null, TRUE );
                        
        /********************************************
         * Page
         ********************************************/
        
        } elseif( is_page() && ! is_page_template() ) {
            
            wp_enqueue_style( 'page-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page/page.css', array(), FALSE, 'all' );

            
        /********************************************
         * Amplify
         ********************************************/
            
        } elseif ( is_page_template( 'page-templates/amplify.php' ) ) {
            
            wp_enqueue_style( 'amplify-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/amplify/amplify.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'amplify-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/amplify/amplify.js', array(), null, TRUE );

            
        /********************************************
         * Amplify -- Guidelines
         ********************************************/
        
        } elseif( is_page_template( 'page-templates/guidelines.php' ) ) {
            
            wp_enqueue_style( 'guidelines-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/amplify/guidelines.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'guidelines-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/amplify/guidelines.js', array(), null, TRUE );
            
            
        /********************************************
         * Engage
         ********************************************/
            
        } elseif ( is_page_template( 'page-templates/engage.php' ) ) {
            
            wp_enqueue_style( 'engage-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/engage/engage.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'bootstrap-css', Functions::replace_public_links( get_template_directory_uri() ) . '/inc/libraries/bootstrap/css/bootstrap.min.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'engage-waypoint-js', '//wp.outbrain.com/wp-content/themes/outbrain/static/engage-files/vr/js/waypoints.vr.js', array(), null, TRUE );
            wp_enqueue_script( 'jquery-easing-js', '//wp.outbrain.com/wp-content/themes/outbrain/static/engage-files/vr/js/jquery.easing.min.js', array(), null, TRUE );
            wp_enqueue_script( 'jquery-typer-js', '//wp.outbrain.com/wp-content/themes/outbrain/static/engage-files/vr/js/jquery.typer.js', array(), null, TRUE );
            wp_enqueue_script( 'engage-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/engage/engage.js', array(), null, TRUE );
            wp_enqueue_script( 'bootstrap-js', Functions::replace_public_links( get_template_directory_uri() ) . '/inc/libraries/bootstrap/js/bootstrap.min.js', array(), null, TRUE );
            wp_enqueue_style( 'vr-css', '//wp.outbrain.com/wp-content/themes/outbrain/static/engage-files/vr/style.css', array(), FALSE, 'all' );
        
            
        /********************************************
         * About -- Company
         ********************************************/
            
        } elseif ( is_page_template( 'page-templates/company.php' ) ) {

            wp_enqueue_style( 'navigation-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'company-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/company.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/navigation.js', array(), null, TRUE );
                
            
        /********************************************
         * About -- Team
         ********************************************/
            
        } elseif ( is_page_template( 'page-templates/team.php' ) ) {

            wp_enqueue_style( 'navigation-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'team-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/team.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/navigation.js', array(), null, TRUE );
            wp_enqueue_script( 'team-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/team.js', array(), null, TRUE );
               
                
        /********************************************
         * About -- Offices
         ********************************************/
                
        } elseif ( is_page_template( 'page-templates/offices.php' ) ) {

            wp_enqueue_style( 'navigation-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'offices-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/offices.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/navigation.js', array(), null, TRUE );
            wp_enqueue_script( 'offices-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/offices.js', array(), null, TRUE );
              
                
        /********************************************
         * About -- Press
         ********************************************/
                
        } elseif ( is_page_template( 'page-templates/press.php' ) ) {

            wp_enqueue_style( 'navigation-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_style( 'press-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/about/press.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/navigation.js', array(), null, TRUE );
            wp_enqueue_script( 'press-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/about/press.js', array(), null, TRUE );
        
            
        /********************************************
         * Contact
         ********************************************/
        
        } elseif( is_page_template( 'page-templates/contact.php' ) ) {
            
            wp_enqueue_style( 'contact-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/contact/contact.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'contact-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/contact/contact.js', array(), null, TRUE );     
            wp_enqueue_script( 'gravityforms-js', Functions::replace_public_links( get_home_url() ) . '/wp-content/plugins/gravityforms/js/gravityforms.js?ver=1.7.12', array(), null, TRUE );     
            wp_enqueue_script( 'conditional-logic-js', Functions::replace_public_links( get_home_url() ) . '/wp-content/plugins/gravityforms/js/conditional_logic.js?ver=1.7.12', array(), null, TRUE );     
            
            
        /********************************************
         * Legal -- Privacy Policy
         ********************************************/
        
        } elseif ( is_page_template( 'page-templates/privacy-policy.php' ) ) {

            wp_enqueue_style( 'navigation-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/legal/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/legal/navigation.js', array(), null, TRUE );
            wp_enqueue_style( 'privacy-policy-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/legal/privacy-policy.css', array(), FALSE, 'all' );
            
        
        /********************************************
         * Legal -- Terms of Use
         ********************************************/
        
        } elseif ( is_page_template( 'page-templates/terms-of-use.php' ) ) {

            wp_enqueue_style( 'navigation-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/legal/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/legal/navigation.js', array(), null, TRUE );
            wp_enqueue_style( 'terms-of-use-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/legal/terms-of-use.css', array(), FALSE, 'all' );
            
        
        /********************************************
         * Legal -- Customer Terms
         ********************************************/
        
        } elseif ( is_page_template( 'page-templates/customer-terms.php' ) ) {

            wp_enqueue_style( 'navigation-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/legal/navigation.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'navigation-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/legal/navigation.js', array(), null, TRUE );
            wp_enqueue_style( 'customer-terms-css', Functions::replace_public_links( get_template_directory_uri() ) . '/css/page-templates/legal/customer-terms.css', array(), FALSE, 'all' );
            wp_enqueue_script( 'customer-terms-js', Functions::replace_public_links( get_template_directory_uri() ) . '/js/page-templates/legal/customer-terms.js', array(), null, TRUE );
         
            
        }
        
        
        /********************************************
         * Check if we are not in admin area..
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
            wp_enqueue_style( 'outbrain-css', Functions::replace_public_links( get_stylesheet_uri() ), array(), FALSE, 'all' );

            
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
        
	if ( $links ) {
            $html = '<nav class="pagination" role="navigation">';
                $html .= $links;
            $html .= '</nav>';
        }
        
        return $html;
        
    }
    
    /**
     * The default webinar editor content
     * @param string $content
     * @param object $post
     * @return string
     */
    public function webinar_default_content( $content, $post ) {
        
        if( $post->post_type === 'webinars' ){
            $content = '<div class="webinar-inner">';
                $content .= '<div class="left">';
                    $content .= '<div class="right">';
                        $content .= '<ul>';
                            $content .= '<li class="image">[ 155 x 155 IMG ]</li>';
                            $content .= '<li class="name">[ Speaker Name ]</li>';
                            $content .= '<li class="title">[ Title/Position ]</li>';
                        $content .= '</ul>';
                    $content .= '</div>';
                    $content .= '<p>Enter the webinar\'s description information here...</p>';
                    $content .= '<p>You can add some list here as well:</p>';
                    $content .= '<ul>';
                        $content .= '<li>Here\'s a sample item</li>';
                        $content .= '<li>And here\'s another sample item</li>';
                        $content .= '<li>And here\'s the last sample item</li>';
                    $content .= '</ul>';
                    $content .= '<p>Some more paragraph here...</p>';
                $content .= '</div>';
            $content .= '</div>';
        }

        return $content;
        
    }
    
    /**
     * Add the stylesheet for the webinar editor
     * @global string $current_screen
     */
    public function webinar_editor_style() {
        
        global $current_screen;
        ( ( $current_screen->post_type === 'webinars' ) ? add_editor_style( 'inc/addons/webinar/css/editor_style.css' ) : false ); 
        
    }
    
}

// call the after theme setup method
add_action( 'after_setup_theme', array( Functions::get_class_full_name(), 'after_setup_theme' ) );