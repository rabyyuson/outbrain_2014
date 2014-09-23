<?php

/**
 * Template Name: Company
 *
 * The template for the company page
 * @url: www.outbrain.com/about/company
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container page-template about company" role="main">
    <div class="row hero">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="details">
                    <h1><?php echo strtoupper( $post->post_title ); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <?php
        // Reference the about page template navigation menu
        include_once( TEMPLATEPATH . '/inc/templates/page-templates/about/navigation.php' );
    ?>
    <div class="row company">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">Lorem Ipsum</h2>
                <p class="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin blandit consequat lorem vitae efficitur. Vestibulum sit amet libero tempus, sollicitudin lectus ac, lobortis quam. Quisque in ornare felis. Quisque dapibus enim id interdum tincidunt. Vivamus pellentesque egestas luctus.
                </p>
                <iframe src="//www.youtube.com/embed/kBTYzbT2VsQ" style="width:100%;height:550px;" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="row company" style="background-color:#fff;">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">Mission</h2>
                <p class="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin blandit consequat lorem vitae efficitur. Vestibulum sit amet libero tempus, sollicitudin lectus ac, lobortis quam. Quisque in ornare felis. Quisque dapibus enim id interdum tincidunt. Vivamus pellentesque egestas luctus.
                    <div style="float:left;width:100%;">
                        <a href="#" style="background-color:#2ca5c3;display:block;width:20%;text-align:center;margin:0 auto;color:#fff;font-weight:600;padding:0.5em 1.5em;font-size:1.15em;text-transform:capitalize;text-decoration:none;border-bottom:3px solid #bdbdbd;">Join Us!</a>
                    </div>
                </p>
            </div>
        </div>
    </div>
    <div class="row company lighthouse">
        <div class="inner clearfix">
            <div class="columns twelve">
            </div>
        </div>
    </div>
</div>
<?php get_footer();