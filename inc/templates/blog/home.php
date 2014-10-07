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
            <?php

                // Loop through all attachments associated with the post and then
                // pull the first image from the array and use it as the featured image.
                $attachments = get_children( array(
                    'post_parent' => get_the_ID(),
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image' 
                ) );
                if( $attachments ){
                    foreach( array_reverse( $attachments ) as $k => $v ){
                        if( $k === 0 ){
                            echo '<img src="' . $v->guid . '" />';
                        }
                    }
                }

           ?>
        </div>
        <div class="content">
            <div class="excerpt">
                <?php echo get_the_excerpt(); ?>
            </div>
            <div class="read-more">
                <a href="<?php echo get_the_permalink(); ?>">Read More</a>
            </div>
        </div>
    </div>
</article>