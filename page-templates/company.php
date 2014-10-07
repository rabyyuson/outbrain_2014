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
<div class="container about company" role="main">
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
    <div class="row section navigation-clip">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">We Are Discovery</h2>
                <p class="description">
                    Outbrain built and operates the world's largest content discovery platform, helping people to discover interesting, relevant, and trusted content wherever they are. Our technology delights readers, drives engagement, creates revenue and delivers consumer insight, reaching an audience of more than 550 million people around the globe each month.
                </p>
                <iframe src="//player.vimeo.com/video/55541898" style="width:100%;height:550px;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="row section mission">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">Creators of the Category</h2>
                <p class="description">
                    Established in 2006, our founders' vision was to recreate the magic of a magazine, a place where each turn of the page provides an opportunity to delight audiences, generate meaningful revenue for publishers and be a place where brands could tell their stories beyond the boxes of online advertising. Today, our programming platform powers online content for many of the world's leading media properties, including CNN, FoxNews, ESPN, The Guardian and The Times of India.
                </p>
            </div>
        </div>
    </div>
    <div class="row section lighthouse">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="quote">
                    <div class="opening-quote-mark">"</div>
                    <div class="message">
                        Help people discover content that they can trust to be interesting, relevant and timely for them.
                    </div>
                    <div class="credentials">
                        <div class="name">Yaron Galai</div>
                        <div class="title">Co-Founder & CEO, Outbrain</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();