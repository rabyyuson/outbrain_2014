<?php

/**
 * Footer (Blog)
 *
 * The global footer for the blog
 * @url: www.outbrain.com/blog
 *
 * -----------------------------------------------------------------------------
 */

?>
<footer class="container <?php echo ( is_home() ? 'home' : false ); ?>">
    <div class="row sub-links">
        <div class="inner clearfix">
            <div class="columns twelve">
                <ul>
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Authors' ) ) ); ?>">Authors</a></li>
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Archives' ) ) ); ?>">Archives</a></li>
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Categories' ) ) ); ?>">Categories</a></li>
                    <li><a href="javascript:void(0)">Subscribe</a></li>
                </ul>
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
                        <li>
                            <a href="http://www.pinterest.com/outbrain/" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-pinterest.png" />
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/user/ContentDiscovery" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-youtube.png" />
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/outbrain" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-linkedin.png" />
                            </a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/+outbrain" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-googleplus.png" />
                            </a>
                        </li>
                        <li>
                            <a href="http://twitter.com/outbrain" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-twitter.png" />
                            </a>
                        </li>
                        <li>
                            <a href="http://facebook.com/outbrain" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-facebook.png" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="columns twelve copyright">
                <p>Copyright &copy; <?php echo date('Y'); ?> Outbrain Inc. All rights reserved. Outbrain is a trademark of Outbrain Inc.</p>
                <a class="logo" href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/footer-logo.png" />
                </a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>