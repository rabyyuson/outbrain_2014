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
    <div class="category-title">
        <?php
            // Get the category list and then extract the first category
            // from the array.
            $category = get_the_category();
            $category = $category[0];
        ?>
        <a href="<?php echo get_category_link( $category->term_id ); ?>">
            <?php echo $category->name; ?>
        </a>
    </div>
    <h2 class="title">
        <a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php echo get_the_title(); ?>
        </a>
    </h2>
    <div class="meta">
        <time>
            <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
        </time>
        <div class="author">
            <a href="<?php echo get_author_posts_url( $post->post_author ); ?>">
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
                    // Get the excerpt and limit the string
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
                        <a href="<?php echo \Outbrain\Classes\Core\Functions::share_this_page( 'facebook', $post ); ?>" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-facebook.png" />
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo \Outbrain\Classes\Core\Functions::share_this_page( 'twitter', $post ); ?>" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-twitter.png" />
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo \Outbrain\Classes\Core\Functions::share_this_page( 'google_plus', $post ); ?>" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-googleplus.png" />
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo \Outbrain\Classes\Core\Functions::share_this_page( 'linkedin', $post ); ?>" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-linkedin.png" />
                        </a>
                    </li>
                </ul>
                <div class="count">0 Shares</div>
            </div>
            <div class="read-more">
                <a href="<?php echo get_the_permalink(); ?>">Read More &rsaquo;</a>
            </div>
        </div>
    </div>
    <div class="close">
        <div class="dash"></div>
    </div>
</article>