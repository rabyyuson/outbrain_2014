<?php

/**
 * Downloads Single Page
 *
 * The template for displaying the blog post detail page.
 * @url: www.outbrain.com/downloads/{slug}
 *
 * -----------------------------------------------------------------------------
 */

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
    <title>Download: <?php echo $wp_query->posts[0]->post_title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/inc/addons/downloads/css/style.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://use.typekit.net/xsa6cds.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
</head>
<body>
<header class="container">
    <div class="row head">
        <div class="inner clearfix">
            <div class="columns eight">
                <a class="logo" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/global/logo.png" alt="Outbrain Logo" />
                </a>
                <a class="back" href="javascript:void(0)">Back to Blog</a>
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
</header>
<div class="container content" role="main">
    <div class="row">
        <div class="inner clearfix">
            <div class="columns eight">
                <?php
                
                    // Loop through the posts and show them
                    if ( have_posts() ) :
                        // Pull the view template for displaying the post data
                        while ( have_posts() ) : the_post(); ?>
                        
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                
                <?php 
                        endwhile;
                    endif; ?>
            </div>
            <div class="columns four">
                <?php gravity_form(16, false, false, false, null, true, 1); ?>
            </div>
        </div>
    </div>
</div>
<footer class="container">
    <div class="row">
        <div class="inner clearfix">
            <div class="columns four">
                <ul>
                    <li>
                        <a href="javascript:void(0)">About Outbrain</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Privacy Policy</a>
                    </li>
                </ul>
            </div>
            <div class="columns eight">
                <p>Copyright © 2014 Outbrain Inc. All rights reserved. Outbrain is a trademark of Outbrain Inc.</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>