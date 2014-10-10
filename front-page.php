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
                    <h1>Discover What's Next</h1>
                    <p>We bring great content to audiences wherever they are.</p>
                    <a href="<?php echo get_home_url(); ?>/amplify/">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row amplify-engage">
        <div class="inner clearfix">
            <div class="columns twelve teaser">
                <div class="columns six amplify">
                    <h2>Amplify Your Content</h2>
                    <p>Personalized  content recommendations connect your business with highly engaged audiences.</p>
                    <a href="<?php echo get_home_url(); ?>/amplify/">Learn More</a>
                </div>
                <div class="columns six engage">
                    <h2>Engage Your Audience</h2>
                    <p>Publishers generate a more engaged, satisfied audience while increasing long-term monetization.</p>
                    <a href="<?php echo get_home_url(); ?>/engage/">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row info-partners">
        <div class="inner clearfix">
            <div class="columns twelve value">
                <div class="columns eight benefits">
                    <h2>The world's largest and most trusted content discovery platform</h2>
                    <ul>
                        <li class="personalization">
                            <h4>Personalization</h4>
                            <p>Offer a more personalized experience your audience can trust</p>
                        </li>
                        <li class="exposure">
                            <h4>Exposure</h4>
                            <p>Expose your content in context to people ready to engage</p>
                        </li>
                        <li class="efficient">
                            <h4>Efficient</h4>
                            <p>Connect seamlessly with engaged audiences, wherever they may be</p>
                        </li>
                        <li class="monetization">
                            <h4>Monetization</h4>
                            <p>Results-driven, simple, pay-per-click model</p>
                        </li>
                        <li class="connection">
                            <h4>Connection</h4>
                            <p>Enhance the user experience while adding native monetization</p>
                        </li>
                        <li class="insights">
                            <h4>Insights</h4>
                            <p>Gain actionable insights to refine your media strategies</p>
                        </li>
                    </ul>
                </div>
                <div class="columns four clients">
                    <h2>Our Partners</h2>
                    <ul>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/front/client-usweekly.png" /></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/front/client-usweekly.png" /></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/front/client-usweekly.png" /></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/front/client-usweekly.png" /></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/front/client-usweekly.png" /></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/front/client-usweekly.png" /></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/front/client-usweekly.png" /></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/front/client-usweekly.png" /></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/front/client-usweekly.png" /></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/front/client-usweekly.png" /></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/front/client-usweekly.png" /></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/front/client-usweekly.png" /></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row testimonials">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2>From Our Customers</h2>
                <div class="container">
                    <div class="testimonial first">
                        <div class="quote">"It's less about buying traffic than it is about reaching the right people with relevant headlines to get them to your content."</div>
                        <div class="profile">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/front/sample-photo.jpg" />
                            <div class="name">Dan Horowitz</div>
                            <div class="title">EVP & Senior Partner,<br/>Fleishman-Hillard</div>
                        </div>
                    </div>
                    <div class="testimonial second active">
                        <div class="quote">"Our goal is always to deliver content that adds value to the conversations being held by the end user. Outbrain allows us to do just that."</div>
                        <div class="profile">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/front/sample-photo.jpg" />
                            <div class="name">Katrina Craigwell</div>
                            <div class="title">Global Manager of Digital Marketing, GE</div>
                        </div>
                    </div>
                    <div class="testimonial third">
                        <div class="quote">"Outbrain has been one of our best customer acquisition channels."</div>
                        <div class="profile">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/front/sample-photo.jpg" />
                            <div class="name">Dmitri Leonov</div>
                            <div class="title">VP of Growth, Sanebox</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();