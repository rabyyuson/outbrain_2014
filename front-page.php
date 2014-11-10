<?php

/**
 * Front Page Template
 *
 * Display the homepage.
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container homepage" role="main">
    <div class="row hero">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="details">
                    <h1>
                        Discover What's Next.
                    </h1>
                    <p>
                        Nulla vel luctus urna id varius nisi enean ex antee gravida commodo. Notice the small downward triangle next to (of all places).
                    </p>
                    <a href="javascript:void(0)">Lorem Ipsum &rsaquo;</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row amplify">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="information">
                    <h2>
                        Outbrain Amplify:
                        <br/>
                        Get your content discovered
                    </h2>
                    <p>
                        We put links to your content on the web's largest and most respected media properties, including CNN.com, Slate and ESPN. This enables you to reach an engaged, responsive, high-quality audience when they're in prime content-consumption mode.
                    </p>
                    <a href="javascript:void(0)">Start Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row engage">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="information">
                    <h2>
                        Outbrain Engage: The solution for the modern publisher
                    </h2>
                    <p>
                        Outbrain Engage is a platform loaded with activetools that enable publishers to drive high-value, targeted audience engagement and build the revenue needed for a thriving business
                    </p>
                    <a href="javascript:void(0)">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row discovery-platform">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">The world's largest content discovery platform</h2>
                <p class="description">
                    It's a marketplace between the world's leading publishers and marketers (including 80% of the worlds leading brands) who want their content to be discovered. <a href="javascript:void(0)">Learn more about Outbrain &rsaquo;</a> 
                </p>
                <div class="animation">
                    <div class="container">
                        <img class="partners" src="<?php echo get_template_directory_uri();  ?>/images/page-templates/amplify/publisher-logos.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row outbrain-numbers">
        <div class="inner clearfix">
            <div class="columns twelve">
                <?php
                    // Reference the about page template navigation menu
                    include_once( TEMPLATEPATH . '/inc/templates/page-templates/global/frontpage-company.php' );
                ?>
            </div>
        </div>
    </div>
    <div class="row testimonials">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div id="carousel">
                    <div class="slides" u="slides">
                        <span u="arrowleft" class="jssora13l" style="width: 20%; height: 100%; top: 0 !important; left: 0;"></span>
                        <span u="arrowright" class="jssora13r" style="width: 20%; height: 100%; top: 0 !important; right: 0"></span>
                        <div class="item">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri();  ?>/images/front/sample-photo.jpg" />
                            </div>
                            <div class="information">
                                <div class="copy">
                                    Our goal is always to deliver content that adds value to the conversations being held by the end user. Outbrain allows us to do just that.
                                </div>
                                <div class="name">Dmitri Leonov</div>
                                <div class="title">Co-Founder and VP of Growth,</div>
                                <div class="company">CNN</div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri();  ?>/images/front/sample-photo1.jpg" />
                            </div>
                            <div class="information">
                                <div class="copy">
                                    Our goal is always to deliver content that adds value to the conversations being held by the end user. Outbrain allows us to do just that.
                                </div>
                                <div class="name">Dmitri Leonov</div>
                                <div class="title">Co-Founder and VP of Growth,</div>
                                <div class="company">CNN</div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri();  ?>/images/front/sample-photo.jpg" />
                            </div>
                            <div class="information">
                                <div class="copy">
                                    Our goal is always to deliver content that adds value to the conversations being held by the end user. Outbrain allows us to do just that.
                                </div>
                                <div class="name">Dmitri Leonov</div>
                                <div class="title">Co-Founder and VP of Growth,</div>
                                <div class="company">CNN</div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri();  ?>/images/front/sample-photo1.jpg" />
                            </div>
                            <div class="information">
                                <div class="copy">
                                    Our goal is always to deliver content that adds value to the conversations being held by the end user. Outbrain allows us to do just that.
                                </div>
                                <div class="name">Dmitri Leonov</div>
                                <div class="title">Co-Founder and VP of Growth,</div>
                                <div class="company">CNN</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row powered-people">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">Outbrain is powered by people</h2>
                <p class="description">
                    It's a marketplace between the world's leading publishers and marketers (including 80% of the worlds leading brands) who want their content to be discovered. <a href="javascript:void(0)">Join us today &rsaquo;</a>
                </p>
            </div>
        </div>
    </div>
    <div class="row powered-people-collage"></div>
</div>
<?php get_footer();