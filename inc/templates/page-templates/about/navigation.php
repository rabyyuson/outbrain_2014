<?php

/**
 * About Page Template's Navigation Menu
 * 
 * Globalize the navigation menu for the about page template.
 * 
 * -----------------------------------------------------------------------------
 */

?>
<div class="row sub-navigation first-level">
    <div class="inner clearfix">
        <div class="columns twelve">
            <span class="indicator page-<?php echo ( $wp_query->query_vars['pagename'] ); ?>"></span>
            <ul>
                <li class="columns two nav-link company" data-jump="first">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Company' ) ) ); ?>">Company</a>
                </li>
                <li class="columns two nav-link team" data-jump="second">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Team' ) ) ); ?>">Leadership</a>
                </li>
                <li class="columns two nav-link offices" data-jump="third">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Offices' ) ) ); ?>">Offices</a>
                </li>
                <li class="columns two nav-link careers" data-jump="fourth">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Careers' ) ) ); ?>">Careers</a>
                </li>
                <li class="columns two nav-link press" data-jump="fifth">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Press' ) ) ); ?>">Press</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row sub-navigation second-level">
    <div class="inner clearfix">
        <div class="columns twelve">
            <span class="indicator page-<?php echo ( $wp_query->query_vars['pagename'] ); ?>"></span>
            <div class="columns two logo">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/global/logo.png" alt="Outbrain Logo" />
                </a>
            </div>
            <div class="columns two company">
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Company' ) ) ); ?>" class="nav-link">Company</a>
            </div>
            <div class="columns two leadership">
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Team' ) ) ); ?>" class="nav-link">Leadership</a>
            </div>
            <div class="columns two offices">
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Offices' ) ) ); ?>" class="nav-link">Offices</a>
            </div>
            <div class="columns two careers">
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Careers' ) ) ); ?>" class="nav-link">Careers</a>
            </div>
            <div class="columns two press">
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Press' ) ) ); ?>" class="nav-link">Press</a>
            </div>
        </div>
    </div>
</div>