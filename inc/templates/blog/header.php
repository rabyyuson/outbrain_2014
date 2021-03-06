<?php

/**
 * Header (Blog)
 *
 * The global header for the blog
 * @url: www.outbrain.com/blog
 *
 * -----------------------------------------------------------------------------
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="utf-8">	
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
    <meta name="p:domain_verify" content="f2e4b6c669399a1356c8394cbf6d2bfb"/>
    <meta name="google-site-verification" content="pqwHMrZc0kt8HDXj4j4aI2e-KSl3rYJgBD9E84mnhD8" />
    <meta property="og:site_name" content="Outbrain" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo \Outbrain\Classes\Core\Functions::get_first_post_image(); ?>" />
    <meta property="og:description" content="<?php echo wp_strip_all_tags( \Outbrain\Classes\Core\Functions::get_post_content_description(), 1 ); ?>" />
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <?php function ob_getMyURL(){ echo ( function_exists ( 'getMyURL' ) ? getMyURL() : 'https://my2.outbrain.com' ); } ?>
    <!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/ie/html5.js" type="text/javascript"></script><![endif]-->
    <script> var myURL = '<?php ob_getMyURL(); ?>', _sf_startpt = (new Date()).getTime(), stylesheetDir = '<?php echo get_bloginfo('stylesheet_directory') ?>', envItems = '<?php $environment = \Outbrain\Classes\Core\Functions::get_kissmetrics_keys(); echo $environment['kissmetrics_key']; ?>'; </script>
    <link rel="icon" href="http://www.outbrain.com/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="container">
        <div class="row head">
            <div class="inner clearfix">
                <div class="columns eight">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/global/logo.png" alt="Outbrain Logo" />
                        <div class="sub-title"><?php echo ( function_exists( 'get_field' ) ? get_field( 'blog_global_title', 'option' ) : false ); ?></div>
                    </a>
                </div>
                <nav class="columns four">
                    <ul>
                        <li>
                            <a href="http://facebook.com/outbrain" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-facebook.png" />
                            </a>
                        </li>
                        <li>
                            <a href="http://twitter.com/outbrain" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-twitter.png" />
                            </a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/+outbrain" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-googleplus.png" />
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/outbrain" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-linkedin.png" />
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/user/ContentDiscovery" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-youtube.png" />
                            </a>
                        </li>
                        <li>
                            <a href="http://www.pinterest.com/outbrain/" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-pinterest.png" />
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row sub-head">
            <div class="inner clearfix">
                <div class="columns eight">
                    <ul>
                    <?php
                    
                        // Get all categories.
                        $categories = array(
                            'all' => get_categories(),
                            'featured' => array()
                        );
                        
                        // Loop through all the categories and identify
                        // which ones are featured. Also store the order id.
                        foreach( $categories['all'] as $k => $v ) {
                            if( function_exists( 'get_field' ) && (int)get_field( 'category_featured', $v ) === 1 ) {
                                array_push( $categories['featured'], array( 'data' => $v, 'order' => (int)get_field( 'category_order', $v ) ) );
                            }
                        }
                    
                        // Sort the users by order value
                        usort( $categories['featured'], '\Outbrain\Classes\Core\Functions::sort_by_order_value' );
                        
                        // Loop through the refined featured categories and show them
                        foreach( $categories['featured'] as $k => $v ):
                            ?>
                            <li>
                                <a href="<?php echo get_category_link( $v['data']->term_id ); ?>">
                                    <?php echo $v['data']->name; ?>
                                </a>
                            </li>
                    <?php 
                        endforeach; ?>
                    </ul>
                </div>
                <div class="columns four">
                    <ul>
                        <li>
                            <a href="<?php echo get_home_url(); ?>">
                                Home
                            </a>
                        </li> 
                        <li>
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Amplify' ) ) ); ?>">
                                Marketers
                            </a>
                        </li> 
                        <li>
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Engage' ) ) ); ?>">
                                Publishers
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Company' ) ) ); ?>">
                                About
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact' ) ) ); ?>">
                                Contact
                            </a>
                        </li>
                        <li class="last">
                            <a href="http://help.outbrain.com/" target="_blank">
                                Help
                            </a>
                        </li>  
                    </ul>
                </div>
            </div>
        </div>
        <div class="row breadcrumbs">
            <div class="inner clearfix">
                <ul>
                    <?php 
                        // Get the breadcrumbs and display it.
                        // Check to see what type it is (link/placeholder).
                        foreach( \Outbrain\Classes\Core\Functions::get_breadcrumbs() as $k => $v ) :
                            if( $v['type'] === 'link' ): ?>
                                <li>
                                    <a href="<?php echo $v['url']; ?>">
                                        <?php echo $v['text']; ?>
                                    </a>
                                </li>
                    <?php 
                            elseif( $v['type'] === 'placeholder' ): ?>
                                <li>
                                    <span>
                                        <?php echo $v['text']; ?>
                                    </span>
                                </li>
                    <?php
                            endif;
                        endforeach; 
                    ?>
                </ul>
            </div>
        </div>
    </header>