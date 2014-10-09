<?php

/**
 * Blog Posts Index
 *
 * Displays the blog posts listing
 * @url: www.outbrain.com/blog
 * 
 * -----------------------------------------------------------------------------
 */

?>
<article <?php echo ( ( is_sticky() && is_home() && ! is_paged() ) ? 'class="sticky"' : false ); ?>>
    <h1 class="title">
        <a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php echo get_the_title(); ?>
        </a>
    </h1>
    <div class="meta">
        <time>
            <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
        </time>
        <div class="author">
            <a href="<?php echo get_the_author_link(); ?>">
                <?php echo get_the_author(); ?>
            </a>
        </div>
    </div>
    <div class="information">
        <div class="featured-image">
            <?php echo ( has_post_thumbnail() ? '<a href="' . get_the_permalink() . '">'. get_the_post_thumbnail( null, 'featured-thumbnail', '' ) . '</a>' : false ); ?>
        </div>
        <div class="content">
            <div class="excerpt">
                <?php
                    // Get the excerpt and limit the string out to 200
                    $excerpt = explode( ' ',get_the_excerpt() );
                    if( (int)strpos( $excerpt[0], '&nbsp' ) === 0 ) {
                        unset( $excerpt[0] );
                    }
                    echo substr( implode( ' ', $excerpt ), 0, 220 ) . '...';
                ?>
            </div>
            <div class="social">
                <ul>
                    <li>
                        <a href="javascript:void(0)" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-facebook.png" />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-twitter.png" />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-googleplus.png" />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-linkedin.png" />
                        </a>
                    </li>
                </ul>
                <div class="count">Shares</div>
            </div>
            <div class="read-more">
                <a href="<?php echo get_the_permalink(); ?>">Read More &raquo;</a>
            </div>
        </div>
    </div>
    <div class="close">
        <div class="dash"></div>
    </div>
</article>