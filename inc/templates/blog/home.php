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
<article class="<?php echo ( ( is_sticky() && is_home() && ! is_paged() ) ? 'sticky' : false ); ?>">
    <h1>
        <a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php echo get_the_title(); ?>
        </a>
    </h1>
    <time>
        <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
    </time>
    <div class="author">
        <?php echo get_the_author(); ?>
    </div>
    <div class="excerpt">
        <?php echo get_the_excerpt(); ?>
    </div>
</article>