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
                    <a href="javascript:void(0)">Careers</a>
                </li>
                <li class="columns two nav-link press" data-jump="fifth">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Press' ) ) ); ?>">Press</a>
                </li>
            </ul>
        </div>
    </div>
</div>