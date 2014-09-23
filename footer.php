<?php

/**
 * Footer Template
 *
 * The template for the global footer area. This interests section, mega footer,
 * social links, and copyright.
 *
 * -----------------------------------------------------------------------------
 */

?>
<footer class="container">
    <div class="row interests">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="columns four traffic">
                    <div class="content">
                        <h2>Amplify Your Content</h2>
                        <p>Get links to your content recommended across more than 100,000 publisher sites.</p>
                        <a href="<?php echo get_home_url(); ?>/amplify/">Get Started</a>
                    </div>
                </div>
                <div class="columns four growing">
                    <div class="content">
                        <h2>We Are Growing</h2>
                        <p>We're looking for great folks to join our team, we want you if you're "Outbrainy".</p>
                        <a href="<?php echo get_home_url(); ?>/about/jobs/">Apply Now</a>
                    </div>
                </div>
                <div class="columns four blog">
                    <div class="content">
                        <h2>The Brainiac Blog</h2>
                        <p>For the latest content tips, data-driven insights and general "Outbrainy" goings-on.</p>
                        <a href="<?php echo get_home_url(); ?>/blog/">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mega-footer">
        <div class="inner clearfix">
            <div class="columns twelve">
                <nav class="columns eight">
                    <ul>
                        <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Amplify' ) ) ); ?>">Amplify</a></li>
                        <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Engage' ) ) ); ?>">Engage</a></li>
                        <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Company' ) ) ); ?>">Company</a></li>
                        <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>">Blog</a></li>
                    </ul>
                    <ul>
                        <li><a href="http://help.outbrain.com/" target="_blank">Support</a></li>
                        <li><a href="http://outbrain.mytribehr.com/careers/">Jobs</a></li>
                        <li><a href="http://help.outbrain.com/?b_id=1524" target="__blank">Help / Faq</a></li>
                        <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Privacy Policy' ) ) ); ?>">Privacy and Cookie Policy</a></li>
                    </ul>
                    <ul>
                        <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Guidelines' ) ) ); ?>">Content Guidelines</a></li>
                        <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact' ) ) ); ?>">Contact Us</a></li>
                    </ul>
                </nav>
                <div class="columns four">
                    <div class="title">Follow Us:</div>
                    <ul>
                        <li class="first">
                            <a href="https://plus.google.com/+outbrain" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/global/social-googleplus.png" />
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/outbrain" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/global/social-linkedin.png" />
                            </a>
                        </li>
                        <li>
                            <a href="http://facebook.com/outbrain" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/global/social-facebook.png" />
                            </a>
                        </li>
                        <li class="last">
                            <a href="http://twitter.com/outbrain" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/global/social-twitter.png" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="columns twelve copyright">
                <p>Copyright &copy; <?php echo date('Y'); ?> Outbrain Inc. All rights reserved. Outbrain is a trademark of Outbrain Inc.</p>
                <a class="logo" href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/global/logo-footer.png" />
                </a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>