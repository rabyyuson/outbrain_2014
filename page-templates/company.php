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
                    Outbrain captures the value of bringing great audiences and great content together. We delight readers, create revenue, drive engagement and breed consumer insights, bringing together the premium publishers and marketers of all sizes into the world’s largest and most vibrant content marketplace.
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
                <h2 class="title">Outbrain by the Numbers</h2>
                <p class="description">
                    We were first in creating content discovery and we are first in markets across the world. We reach more than a half billion people globally each month.
                </p>
                <?php
                    // Reference the about page template navigation menu
                    include_once( TEMPLATEPATH . '/inc/templates/page-templates/global/frontpage-company.php' );
                ?>
            </div>
        </div>
    </div>
    <div class="row section global-offices">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">A global footprint of service</h2>
                <p class="description">
                    We operate offices in 11 global territories and we partner with publishers and marketers in over 55 countries, including the U.S., UK, France, Brazil, India and Japan.
                </p>
                <ul class="map">
                    <li class="location" data-coordinates-y="174" data-coordinates-x="112" data-margin-left="143">
                        <div class="information">
                            <p>San Francisco, CA, USA</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="232" data-coordinates-x="557" data-margin-left="109">
                        <div class="information">
                            <p>Netanya, Israel</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="166" data-coordinates-x="457" data-margin-left="87">
                        <div class="information">
                            <p>London, UK</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="182" data-coordinates-x="469" data-margin-left="97">
                        <div class="information">
                            <p>Paris, France</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="175" data-coordinates-x="489" data-margin-left="123">
                        <div class="information">
                            <p>Munich, Germany</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="201" data-coordinates-x="223" data-margin-left="112">
                        <div class="information">
                            <p>Chicago, IL, USA</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="328" data-coordinates-x="748" data-margin-left="80">
                        <div class="information">
                            <p>Singapore</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="421" data-coordinates-x="878" data-margin-left="127">
                        <div class="information">
                            <p>Sydney, Australia</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="222" data-coordinates-x="226" data-margin-left="118">
                        <div class="information">
                            <p>Atlanta, GA, USA</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="387" data-coordinates-x="331" data-margin-left="124">
                        <div class="information">
                            <p>São Paulo, Brazil</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="193" data-coordinates-x="485" data-margin-left="91">
                        <div class="information">
                            <p>Milan, Italy</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="208" data-coordinates-x="450" data-margin-left="98">
                        <div class="information">
                            <p>Madrid, Spain</p>
                        </div>
                    </li>
                    <li class="location" data-coordinates-y="220" data-coordinates-x="845" data-margin-left="9*">
                        <div class="information">
                            <p>Tokyo, Japan</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php get_footer();