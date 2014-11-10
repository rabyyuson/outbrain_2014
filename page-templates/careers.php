<?php

/**
 * Template Name: Careers
 *
 * The template for the careers page
 * @url: www.outbrain.com/about/careers
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container about careers" role="main">
    <div class="row hero">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="details">
                    <h1>
                        Join our team
                    </h1>
                    <p>
                        One of Crain's 2014 Best Places to Work!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
        // Reference the about page template navigation menu
        include_once( TEMPLATEPATH . '/inc/templates/page-templates/about/navigation.php' );
    ?>
    <div class="row head navigation-clip">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">We're Outbrain, and we're growing!</h2>
                <p class="description">
                    We're developing the world's best platform for the continual discovery of high quality content. You've probably seen us before and didn't know it was Outbrain. In fact, we bet you've clicked on one of our links. 'Cause they're pretty good.
                </p>
                <div class="cta">
                    <p>Want to work with us?</p>
                    <a href="http://outbrain.mytribehr.com/careers">Apply Now!</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row think-outbrainy">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2>Think you have what it takes to be "Outbrainy"?</h2>
                <div class="columns three passionate">
                    <div class="icon"></div>
                    <h3>Passionate</h3>
                    <div class="dash"></div>
                    <p>Loves good content and sharing personal interests.</p>
                </div>
                <div class="columns three collaborative">
                    <div class="icon"></div>
                    <h3>Collaborative</h3>
                    <div class="dash"></div>
                    <p>Thrives in a team and won’t let ego into the workplace.</p>
                </div>
                <div class="columns three techy">
                    <div class="icon"></div>
                    <h3>Techy</h3>
                    <div class="dash"></div>
                    <p>Well-read tech nerd psyched to work on innovative products.</p>
                </div>
                <div class="columns three worldly">
                    <div class="icon"></div>
                    <h3>Worldly</h3>
                    <div class="dash"></div>
                    <p>Sees everything through a global kaleidoscope.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row instagram">
        <div class="inner clearfix">
            <div class="columns twelve">
            </div>
        </div>
    </div>
    <div class="row meet-team">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2>Meet the team</h2>
                <div class="columns four">
                    <div class="wrapper" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/page-templates/about/careers/team-natalie.jpg')">
                        <div class="video" data-src="https://player.vimeo.com/video/106547197?title=0&byline=0&portrait=0&autoplay=1"></div>
                        <div class="information">
                            <h3>Natalie Chan</h3>
                            <p>Senior Marketing Manager</p>
                            <a href="javascript:void(0)">Click to meet Natalie</a>
                        </div>
                    </div>
                </div>
                <div class="columns four">
                    <div class="wrapper" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/page-templates/about/careers/team-cody.jpg')">
                        <div class="video" data-src="https://player.vimeo.com/video/106552683?title=0&byline=0&portrait=0&autoplay=1"></div>
                        <div class="information">
                            <h3>Cody Nicholson</h3>
                            <p>Full Stack Engineer</p>
                            <a href="javascript:void(0)">Click to meet Cody</a>
                        </div>
                    </div>
                </div>
                <div class="columns four">
                    <div class="wrapper" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/page-templates/about/careers/team-lior.jpg')">
                        <div class="video" data-src="https://player.vimeo.com/video/106552681?title=0&byline=0&portrait=0&autoplay=1"></div>
                        <div class="information">
                            <h3>Lior Charka</h3>
                            <p>Product Manager</p>
                            <a href="javascript:void(0)">Click to meet Lior</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row bottom">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">Job listings</h2>
                <p class="description">
                    Outbrain offers a competitive salary, benefits, and a great working environment.  If you’re Outbrainy, check out our current openings below.
                </p>
                <div class="cta">
                    <p>Want to work with us?</p>
                    <a href="http://outbrain.mytribehr.com/careers">Apply Now!</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();