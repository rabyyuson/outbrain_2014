<?php

/**
 * Main Header Template
 *
 * The template for the global header area. This displays any elements located
 * at the top area of the page including the site title, navigation menu, 
 * log-in box, etc.
 *
 * -----------------------------------------------------------------------------
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <!--------------------------------------------------------------------------
    
        Made with love by:
    
                     _   _               _
                    | | | |             (_)
          ___  _   _| |_| |__  _ __ __ _ _ _ __
         / _ \| | | | __| '_ \| '__/ _` | | '_ \
        | (_) | |_| | |_| |_) | | | (_| | | | | |
         \___/ \__,_|\__|_.__/|_|  \__,_|_|_| |_|

    
        If you read it, you might be the right guy for us.
        We're hiring great engineers! Join us: visit http://jobs.outbrain.com
    
    --------------------------------------------------------------------------->
    <meta charset="utf-8">	
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
    <meta name="p:domain_verify" content="f2e4b6c669399a1356c8394cbf6d2bfb"/>
    <meta name="google-site-verification" content="pqwHMrZc0kt8HDXj4j4aI2e-KSl3rYJgBD9E84mnhD8" />
    <meta property="og:site_name" content="Outbrain" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo \Outbrain\Classes\Core\Functions::get_first_post_image(); ?>" />
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <?php function ob_getMyURL(){ echo ( function_exists ( 'getMyURL' ) ? getMyURL() : 'https://my2.outbrain.com' ); } ?>
    <!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/ie/html5.js" type="text/javascript"></script><![endif]-->
    <script> var myURL = '<?php ob_getMyURL(); ?>', _sf_startpt = (new Date()).getTime(), stylesheetDir = '<?php echo get_bloginfo('stylesheet_directory') ?>', envItems = '<?php $environment = \Outbrain\Classes\Core\Functions::get_kissmetrics_keys(); echo $environment['kissmetrics_key']; ?>'; </script>
    <link rel="icon" href="http://www.outbrain.com/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="container">
        <div class="row">
            <div class="inner clearfix">
                <div class="columns twelve desktop-menu">
                    <div class="columns two logo">
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/global/logo.png" alt="Outbrain Logo" />
                        </a>
                    </div>
                    <nav class="columns eight">
                        <ul>
                            <li class="first">
                                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Amplify' ) ) ); ?>" <?php echo ( $wp_query->query_vars['pagename'] === 'amplify' ? 'class="selected"' : false ); ?>>
                                    Amplify
                                </a>
                            </li> 
                            <li>
                                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Engage' ) ) ); ?>" <?php echo ( $wp_query->query_vars['pagename'] === 'engage' ? 'class="selected"' : false ); ?>>
                                    Engage
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Company' ) ) ); ?>" <?php echo ( get_the_title( $post->post_parent ) === 'About' ? 'class="selected"' : false ); ?>>
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>" <?php echo ( $wp_query->query_vars['pagename'] === 'blog' || $wp_query->is_single || $wp_query->is_archive || $wp_query->is_category ? 'class="selected"' : false ); ?>>
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact' ) ) ); ?>" <?php echo ( $wp_query->query_vars['pagename'] === 'contact' ? 'class="selected"' : false ); ?>>
                                    Contact
                                </a>
                            </li>
                            <li class="last">
                                <a href="http://help.outbrain.com/" target="_blank">
                                    Help
                                </a>
                            </li>   
                        </ul>
                    </nav>
                    <div class="columns two sign-in">
                        <div class="logIn">
                            <a href="<?php ob_getMyURL() ?>/?kme=hp%20login%20click&km_pos=top%20green%20button">Login</a>
                            <span>or</span>
                            <a href="<?php ob_getMyURL() ?>/register?kme=hp%20register%20click&km_pos=top%20green%20button">Register</a>
                        </div>
                        <div class="loggedIn">
                            <a href="<?php ob_getMyURL() ?>/user"><s:property value="userHandle.name"/></a>
                            <span>|</span>
                            <a href="<?php ob_getMyURL() ?>/logout"> Logout</a>
                        </div>
                    </div>
                </div>
                <div class="columns twelve mobile-menu">
                    <div class="columns twelve first-level">
                        <a class="hamburger" href="javascript:void(0)">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/global/hamburger.png" />
                        </a>
                        <a class="logo"  href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/global/logo.png" alt="Outbrain Logo" />
                        </a>
                        <a class="sign-in" href="<?php ob_getMyURL() ?>/?kme=hp%20login%20click&km_pos=top%20green%20button">Sign In</a>
                    </div>
                    <nav class="columns twelve second-level">
                        <ul class="first-level">
                            <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
                            <li>
                                <a href="javascript:void(0)" class="dropdown">Amplify</a>
                                <ul class="second-level">
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Amplify' ) ) ); ?>/#whats-amplify">What's Amplify</a></li>
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Amplify' ) ) ); ?>/#features-benefits">Features & Benefits</a></li>
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Amplify' ) ) ); ?>/#testimonials">Testimonials</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="dropdown">Engage</a>
                                <ul class="second-level">
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Engage' ) ) ); ?>/#discovery">Discovery</a></li>
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Engage' ) ) ); ?>/#mobile">Mobile</a></li>
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Engage' ) ) ); ?>/#native-monetization">Native Monetization</a></li>
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Engage' ) ) ); ?>/#editorial-suite">Editorial Suite</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="dropdown">About</a>
                                <ul class="second-level">
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Company' ) ) ); ?>">Company</a></li>
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Team' ) ) ); ?>">Our Team</a></li>
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Offices' ) ) ); ?>">Offices</a></li>
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Jobs' ) ) ); ?>">Jobs</a></li>
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Press' ) ) ); ?>">Press</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="dropdown">Blog</a>
                                <ul class="second-level">
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>">All Posts</a></li>
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>">Categories</a></li>
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>">Authors</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="dropdown">Contact</a>
                                <ul class="second-level">
                                    <li><a href="http://help.outbrain.com/" target="_blank">Help & Support</a></li>
                                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Offices' ) ) ); ?>">Offices & Addresses</a></li>
                                </ul>
                            </li>
                        </ul>
                        <?php get_search_form(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>