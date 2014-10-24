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
    <meta property="og:image" content="http://wp.outbrain.com/wp-content/themes/outbrain/images/logo.png" />
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
                        <div class="sub-title">Content Marketing Hub</div>
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
                            $meta_options = unserialize( get_option( 'category_meta_options_' . $v->term_id ) );
                            if( (int)$meta_options['feature_category'] === 1 ) {
                                array_push( $categories['featured'], array( 'data' => $v, 'order' => (int)$meta_options['order_category'] ) );
                            }
                        }
                    
                        // Sort the users by order value
                        function sort_by_order_value( $a, $b ) {
                            return strcmp( $a['order'], $b['order'] );
                        }
                        usort( $categories['featured'], 'sort_by_order_value' );
                        
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
                </div>
                <div class="columns four">
                    <ul>
                        <li>
                            <a href="<?php echo get_home_url(); ?>">
                                Outbrain Home
                            </a>
                        </li> 
                        <li class="active">
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Amplify' ) ) ); ?>">
                                Amplify
                            </a>
                        </li> 
                        <li>
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Engage' ) ) ); ?>">
                                Engage
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
                    <li>
                        <a href="javascript:void(0)">
                            Blog Home
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            Level 1 Crumb
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>