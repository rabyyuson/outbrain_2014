<?php

/**
 * Legal Page Template's Navigation Menu
 * 
 * Globalize the navigation menu for the legal page template.
 * 
 * -----------------------------------------------------------------------------
 */

?>
<div class="row sub-navigation first-level">
    <div class="inner clearfix">
        <div class="columns twelve">
            <span class="indicator page-<?php echo ( $wp_query->query_vars['pagename'] ); ?>"></span>
            <ul>
                <li class="columns four nav-link privacy-policy" data-jump="first">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Privacy Policy' ) ) ); ?>">Privacy Policy</a>
                </li>
                <li class="columns four nav-link terms-of-use" data-jump="second">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Terms of Use' ) ) ); ?>">Terms of Use</a>
                </li>
                <li class="columns four nav-link customer-terms" data-jump="third">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Customer Terms' ) ) ); ?>">Customer Terms</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row sub-navigation second-level">
    <div class="inner clearfix">
        <div class="columns twelve">
            <span class="indicator page-<?php echo ( $wp_query->query_vars['pagename'] ); ?>"></span>
            <div class="columns three logo">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/global/logo.png" alt="Outbrain Logo" />
                </a>
            </div>
            <div class="columns three privacy-policy">
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Privacy Policy' ) ) ); ?>">Privacy Policy</a>
            </div>
            <div class="columns three terms-of-use">
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Terms of Use' ) ) ); ?>">Terms of Use</a>
            </div>
            <div class="columns three customer-terms">
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Customer Terms' ) ) ); ?>">Customer Terms</a>
            </div>
        </div>
    </div>
</div>