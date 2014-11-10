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
                        Our technology connects great brands with highly engaged audiences across a network of the world's leading media properties.
                    </p>
                    <a href="javascript:void(0)">Learn More &rsaquo;</a>
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
                        We put links to your content on the web's largest and most respected media properties, including CNN.com, Slate and ESPN. And we ensure that it's seen by an engaged, responsive, high-quality audience at precisely the time that they'll it most interesting.
                    </p>
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Amplify' ) ) ); ?>">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row engage">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="information">
                    <h2>
                        Outbrain Engage: The solution for a modern publisher
                    </h2>
                    <p>
                        Outbrain Engage is a full stack software solution that empowers an entire media organization to more effectively manage its online content and programming experience.
                    </p>
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Engage' ) ) ); ?>">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row discovery-platform">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">The world's largest content discovery platform</h2>
                <p class="description">
                    We bring together premium publishers and marketers of all sizes (including 80% of the world's leading brands) into the world's largest and most vibrant content marketplace. <a href="javascript:void(0)">Learn more about Outbrain &rsaquo;</a> 
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
                                    It's less about buying traffic than it is about reaching the right people with relevant headlines to get them to your content.
                                </div>
                                <div class="name">Dan Horowitz</div>
                                <div class="title">EVP and Senior Partner</div>
                                <div class="company">Fleishman-Hillard Digital</div>
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
                                <div class="name">Katrina Craigwell</div>
                                <div class="title">Global Manager of Digital Marketing</div>
                                <div class="company">GE</div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri();  ?>/images/front/sample-photo.jpg" />
                            </div>
                            <div class="information">
                                <div class="copy">
                                    Outbrain is the worldwide leader in content distribution. It's highly effective for reaching the consumer. Outbrain's targeting and international reach is the most appealing aspect of their solution.
                                </div>
                                <div class="name">Michael Hess</div>
                                <div class="title">Senior Digital Manager</div>
                                <div class="company">Weber Shandwick</div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri();  ?>/images/front/sample-photo.jpg" />
                            </div>
                            <div class="information">
                                <div class="copy">
                                    Outbrain is quite simply the perfect and by far the best product for amplifying our content and building our business.
                                </div>
                                <div class="name">Zach Zavos</div>
                                <div class="title">Co-Founder</div>
                                <div class="company">Conversent Media</div>
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
                <h2 class="title">Powered by a global culture</h2>
                <p class="description">
                    We operate offices in 11 global territories and we partner with publishers and marketers in over 55 countries, including the U.S., UK, France, Brazil, India and Japan. <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Careers' ) ) ); ?>">Come join us &rsaquo;</a>
                </p>
            </div>
        </div>
    </div>
    <div class="row powered-people-collage"></div>
</div>
<?php get_footer();