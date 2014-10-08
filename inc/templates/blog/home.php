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
            <?php echo ( has_post_thumbnail() ? get_the_post_thumbnail( null, 'featured-thumbnail', '' ) : false ); ?>
        </div>
        <div class="content">
            <div class="excerpt">
                <?php
                    if( (int)count( explode( ' ', get_the_excerpt() ) ) > 30 ){
                        $content = explode( ' ', get_the_excerpt(), ( 30 ) );
                        if( (int)strpos( $content[0], '&nbsp' ) === 0 ) {
                            unset( $content[0] );
                        }
                        array_pop( $content );
                        echo implode( ' ', $content ) . '...';
                    } else {
                        echo get_the_excerpt();
                    }
                ?>
            </div>
            <div class="social">
                <ul class="networks">
                    <li><a href="javascript:void(0)">[ F ]</a></li>
                    <li><a href="javascript:void(0)">[ T ]</a></li>
                    <li><a href="javascript:void(0)">[ G ]</a></li>
                    <li><a href="javascript:void(0)">[ I ]</a></li>
                </ul>
                <div class="count">Shares</div>
            </div>
            <div class="read-more">
                <a href="<?php echo get_the_permalink(); ?>">Read More</a>
            </div>
        </div>
    </div>
</article>