<?php

/**
 * Legal Page Template's Navigation Menu
 * 
 * Globalize the navigation menu for the legal page template.
 * 
 * -----------------------------------------------------------------------------
 */

?>
<div class="row hero">
    <div class="inner clearfix">
        <div class="columns twelve">
            <div class="details">
                <h1><?php echo strtoupper( $post->post_title ); ?></h1>
            </div>
        </div>
    </div>
</div>
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
<div class="row content">
    <div class="inner clearfix">
        <div class="columns twelve">
            <article>
                <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                ?>
            </article>
        </div>
    </div>
</div>