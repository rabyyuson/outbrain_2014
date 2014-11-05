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
                    <h1>
                        The World's Largest
                        <br/>
                        Content Discovery Platform
                    </h1>
                    <p>
                        Delights readers, drives engagement, creates revenue.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
        // Reference the about page template navigation menu
        include_once( TEMPLATEPATH . '/inc/templates/page-templates/about/navigation.php' );
    ?>
    <div class="row section we-are-discovery navigation-clip">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">We Are Discovery</h2>
                <p class="description">
                    Outbrain built and operates the world's largest content discovery platform, helping people to discover interesting, relevant, and trusted content wherever they are. Our technology delivers consumer insight, reaching an audience of more than 550 million people around the globe each month.
                </p>
            </div>
        </div>
    </div>
    <div class="row section mission">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="teaser">
                    <div class="columns four title">
                        <h3>Our Mission</h3>
                    </div>
                    <div class="columns eight description">
                        Help people discover content that they can trust to be interesting, relevant and timely for them.
                    </div>
                </div>
                <div class="video">
                    <img class="play" src="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/company/play.png" />
                    <video poster="<?php echo get_template_directory_uri(); ?>/inc/external/videos/what-is-outbrain.jpg">
                        <source src="<?php echo get_template_directory_uri(); ?>/inc/external/videos/what-is-outbrain.mp4" type="video/mp4" />
                        <source src="<?php echo get_template_directory_uri(); ?>/inc/external/videos/what-is-outbrain.webm" type="video/webm" />
                        <source src="<?php echo get_template_directory_uri(); ?>/inc/external/videos/what-is-outbrain.ogg" type="video/ogg" />
                        <img alt="Big Buck Bunny" src="<?php echo get_template_directory_uri(); ?>/inc/external/videos/what-is-outbrain.jpg" width="995" height="519" title="No video playback capabilities, please download the video below" />
                        This browser is not compatible with HTML5. Try playing the video manually.
                        <a href="<?php echo get_template_directory_uri(); ?>/inc/external/videos/what-is-outbrain.mp4">Download Video</a>
                    </video>
                </div>
            </div>
        </div>
    </div>
    <div class="row section outbrain-numbers">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">Outbrain Numbers</h2>
                <p class="description">
                    Outbrain built and operates the world's largest content discovery platform, helping people to discover interesting, relevant, and trusted content wherever they are. Our technology delivers consumer insight, reaching an audience of more than 550 million people around the globe each month.
                </p>
                <div class="columns twelve box">
                    <div class="columns four">
                        <h3>555 Million</h3>
                        <p>Global Reach <span>(Unique visitors)</span></p>
                    </div>
                    <div class="columns four">
                        <h3>190 Billion</h3>
                        <p>Monthly Recommendations</p>
                    </div>
                    <div class="columns four">
                        <h3>+165%</h3>
                        <p>Engagement <span>(vs. Social)*</span></p>
                    </div>
                </div>
                <div class="columns twelve footnote">
                    <p>*2014 Audience Engagement Study: Effectiveness of Discovery vs. Search vs. Social.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row section global-offices">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">Global Offices</h2>
                <p class="description">
                    Outbrain built and operates the world's largest content discovery platform, helping people to discover interesting, relevant, and trusted content wherever they are. Our technology delivers consumer insight, reaching an audience of more than 550 million people around the globe each month.
                </p>
                <ul class="map">
                    <li class="location" data-coordinates-y="205" data-coordinates-x="130" data-margin-left="123">
                        <div class="information">
                            <p>San Francisco, USA</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="232" data-coordinates-x="557" data-margin-left="103">
                        <div class="information">
                            <p>Netanya, Israel</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="166" data-coordinates-x="457" data-margin-left="78">
                        <div class="information">
                            <p>London, UK</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php get_footer();